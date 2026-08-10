/* ============================================================
   SERVER.JS — Graphic TECH Node.js Backend REST API
   ============================================================ */

const fs = require('fs');
const path = require('path');
const http = require('http');

const PORT = process.env.PORT || 3000;
const DB_FILE = path.join(__dirname, 'data', 'db.json');
const UPLOADS_DIR = path.join(__dirname, 'uploads');

// Ensure directories exist
if (!fs.existsSync(path.join(__dirname, 'data'))) {
  fs.mkdirSync(path.join(__dirname, 'data'), { recursive: true });
}
if (!fs.existsSync(UPLOADS_DIR)) {
  fs.mkdirSync(UPLOADS_DIR, { recursive: true });
}

// Initial DB Structure
const INITIAL_DB = {
  settings: { username: 'admin', passwordHash: '1234' },
  portfolio: [
    {
      id: 'web-mandarin',
      title: 'Mandarin Oriental E-Commerce',
      category: 'Web Development',
      image: 'assets/images/portfolio/web-mandarin.jpg',
      tags: ['React', 'Node.js', 'E-Commerce'],
      year: 2024,
      description: 'ระบบ E-Commerce ระดับพรีเมียมสำหรับธุรกิจโรงแรมและบริการ หรูหราและใช้งานง่าย'
    },
    {
      id: 'logo-novae',
      title: 'Novae Brand Identity',
      category: 'Branding',
      image: 'assets/images/portfolio/logo-novae.jpg',
      tags: ['Logo', 'Brand Identity', 'Stationery'],
      year: 2024,
      description: 'ออกแบบอัตลักษณ์แบรนด์แบบครบวงจร สร้างภาพจำที่ทันสมัยและโดดเด่น'
    }
  ],
  banners: [
    {
      id: 'banner-1',
      title: 'สร้างแบรนด์ให้แข็งแกร่งด้วยดีไซน์และเทคโนโลยี',
      subtitle: 'Creative × Technology Studio ระดับมืออาชีพ',
      image: 'assets/images/brand/bg-hero.jpg',
      link: '#contact',
      active: true,
      createdAt: new Date().toISOString()
    }
  ],
  messages: []
};

// Read / Write Database
function readDB() {
  try {
    if (!fs.existsSync(DB_FILE)) {
      fs.writeFileSync(DB_FILE, JSON.stringify(INITIAL_DB, null, 2));
      return INITIAL_DB;
    }
    const data = fs.readFileSync(DB_FILE, 'utf8');
    return JSON.parse(data);
  } catch (err) {
    console.error('Error reading DB file:', err);
    return INITIAL_DB;
  }
}

function writeDB(data) {
  try {
    fs.writeFileSync(DB_FILE, JSON.stringify(data, null, 2));
  } catch (err) {
    console.error('Error writing DB file:', err);
  }
}

// Minimal HTTP Server handling API and Static Serving
const server = http.createServer((req, res) => {
  // CORS Headers
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

  if (req.method === 'OPTIONS') {
    res.writeHead(204);
    res.end();
    return;
  }

  const parsedUrl = new URL(req.url, `http://${req.headers.host}`);
  const pathname = parsedUrl.pathname;

  // Helper response
  const json = (data, status = 200) => {
    res.writeHead(status, { 'Content-Type': 'application/json' });
    res.end(JSON.stringify(data));
  };

  // Health check
  if (pathname === '/api/health') {
    return json({ status: 'ok', time: new Date().toISOString() });
  }

  // Parse JSON Body Helper
  let body = '';
  req.on('data', chunk => { body += chunk; });
  req.on('end', () => {
    let payload = {};
    try {
      if (body) payload = JSON.parse(body);
    } catch (e) {}

    const db = readDB();

    // REST API Routes
    if (pathname === '/api/auth/login' && req.method === 'POST') {
      const { username, password } = payload;
      if (username === db.settings.username && password === db.settings.passwordHash) {
        return json({ success: true, token: 'gt_token_' + Date.now(), user: username });
      }
      return json({ success: false, message: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง' }, 401);
    }

    if (pathname === '/api/portfolio' && req.method === 'GET') {
      return json(db.portfolio);
    }

    if (pathname === '/api/portfolio' && req.method === 'POST') {
      const newItem = { id: 'item-' + Date.now(), ...payload, createdAt: new Date().toISOString() };
      db.portfolio.unshift(newItem);
      writeDB(db);
      return json({ success: true, item: newItem }, 201);
    }

    if (pathname.startsWith('/api/portfolio/') && req.method === 'DELETE') {
      const id = pathname.split('/').pop();
      db.portfolio = db.portfolio.filter(item => item.id !== id);
      writeDB(db);
      return json({ success: true });
    }

    if (pathname === '/api/banners' && req.method === 'GET') {
      return json(db.banners);
    }

    if (pathname === '/api/banners' && req.method === 'POST') {
      const newBanner = { id: 'banner-' + Date.now(), ...payload, createdAt: new Date().toISOString() };
      db.banners.unshift(newBanner);
      writeDB(db);
      return json({ success: true, banner: newBanner }, 201);
    }

    if (pathname === '/api/messages' && req.method === 'GET') {
      return json(db.messages);
    }

    if (pathname === '/api/messages' && req.method === 'POST') {
      const newMsg = { id: 'msg-' + Date.now(), ...payload, read: false, createdAt: new Date().toISOString() };
      db.messages.unshift(newMsg);
      writeDB(db);
      return json({ success: true, message: newMsg }, 201);
    }

    if (pathname === '/api/stats' && req.method === 'GET') {
      return json({
        totalPortfolio: db.portfolio.length,
        totalBanners: db.banners.length,
        totalMessages: db.messages.length,
        unreadMessages: db.messages.filter(m => !m.read).length
      });
    }

    // Default Fallback
    return json({ message: 'Graphic TECH API Server is running' });
  });
});

server.listen(PORT, () => {
  console.log(`Graphic TECH REST API Server running at http://localhost:${PORT}`);
});

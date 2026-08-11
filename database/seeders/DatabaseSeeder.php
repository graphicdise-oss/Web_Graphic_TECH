<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Message;
use App\Models\Poster;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Support\PlaceholderImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@graphictech.co.th'],
            [
                'name' => 'แอดมิน Graphic TECH',
                'password' => Hash::make('1234'),
            ]
        );

        // ---------------------------------------------------------------
        // Services (also drives the /pages/{slug} detail page content)
        // ---------------------------------------------------------------
        $services = [
            [
                'slug' => 'service-uiux',
                'name' => 'UI/UX Design',
                'description' => 'ออกแบบประสบการณ์ผู้ใช้ที่ใช้งานง่ายและสวยงาม',
                'icon' => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>',
                'content' => [
                    'tags' => 'Research · Wireframe · Prototype',
                    'subtitle' => 'ออกแบบประสบการณ์ผู้ใช้ที่ใช้งานง่าย สวยงาม และตอบโจทย์เป้าหมายทางธุรกิจอย่างแท้จริง ตั้งแต่ Research จนถึง Prototype พร้อม Handoff',
                    'stats' => [
                        ['value' => '120+', 'label' => 'โปรเจกต์ที่สำเร็จ'],
                        ['value' => '98%', 'label' => 'ลูกค้าพึงพอใจ'],
                        ['value' => '5+', 'label' => 'ปีประสบการณ์'],
                    ],
                    'deliverables' => [
                        ['icon' => '<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>', 'title' => 'User Research', 'desc' => 'User Interview, Persona, Journey Map, Heuristic Evaluation'],
                        ['icon' => '<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>', 'title' => 'Wireframe & IA', 'desc' => 'Information Architecture, Sitemap, Low-fidelity Wireframe'],
                        ['icon' => '<circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>', 'title' => 'UI Design', 'desc' => 'Design System, High-fidelity Mockup, Responsive Design'],
                        ['icon' => '<path d="M5 3l14 9-14 9V3z"/>', 'title' => 'Interactive Prototype', 'desc' => 'Clickable Prototype, Usability Testing, Figma Handoff'],
                    ],
                    'process' => [
                        ['title' => 'Discover', 'desc' => 'ทำความเข้าใจธุรกิจ ผู้ใช้งาน และเป้าหมายของโปรเจกต์'],
                        ['title' => 'Define', 'desc' => 'วิเคราะห์และกำหนด User Persona, Journey Map, Problem Statement'],
                        ['title' => 'Design', 'desc' => 'ออกแบบ Wireframe → UI → Design System ที่สอดคล้องกับ Brand'],
                        ['title' => 'Prototype & Test', 'desc' => 'สร้าง Interactive Prototype และทดสอบกับ Real Users'],
                        ['title' => 'Handoff', 'desc' => 'ส่งมอบ Design Spec ครบถ้วนพร้อม Dev Handoff บน Figma'],
                    ],
                    'cta' => ['title' => 'พร้อมยกระดับ UX ของคุณ?', 'text' => 'ปรึกษาทีม UX Designer ของเราได้ฟรี พร้อม UX Audit เบื้องต้น', 'button' => 'ขอ Free UX Audit →'],
                ],
            ],
            [
                'slug' => 'service-graphic',
                'name' => 'Graphic Design',
                'description' => 'งานกราฟิกดิจิทัลและสิ่งพิมพ์ที่โดดเด่น',
                'icon' => '<circle cx="13.5" cy="6.5" r="2.5"/><circle cx="6.5" cy="14.5" r="2.5"/><path d="M17 21v-1a4 4 0 00-4-4H5a4 4 0 00-4 4v1"/><path d="M22 11l-3-3-7 7-3-3"/>',
                'content' => [
                    'tags' => 'Key Visual · Print · Social Content',
                    'subtitle' => 'สร้างสรรค์งานกราฟิกที่โดดเด่น ทั้งสื่อดิจิทัลและสิ่งพิมพ์ ให้แบรนด์คุณสะดุดตา จดจำได้ และสร้างความประทับใจแรกอย่างทรงพลัง',
                    'stats' => [
                        ['value' => '500+', 'label' => 'ชิ้นงานที่สร้าง'],
                        ['value' => '80+', 'label' => 'แบรนด์ที่ดูแล'],
                        ['value' => '7+', 'label' => 'ปีประสบการณ์'],
                    ],
                    'deliverables' => [
                        ['icon' => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>', 'title' => 'Key Visual', 'desc' => 'ภาพหลักสำหรับแคมเปญ โฆษณา และสื่อการตลาด'],
                        ['icon' => '<path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>', 'title' => 'Print Design', 'desc' => 'โบรชัวร์ แผ่นพับ นามบัตร บรรจุภัณฑ์'],
                        ['icon' => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/>', 'title' => 'Social Content', 'desc' => 'โพสต์ Social Media, Story Template, Motion Graphic'],
                        ['icon' => '<path d="M12 2l3 7h7l-5.5 4.5L18.5 21 12 16.5 5.5 21l2-7.5L2 9h7z"/>', 'title' => 'Illustration', 'desc' => 'ภาพประกอบสไตล์เฉพาะสำหรับแบรนด์'],
                    ],
                    'process' => [
                        ['title' => 'Brief & Research', 'desc' => 'ทำความเข้าใจโจทย์ กลุ่มเป้าหมาย และแรงบันดาลใจ'],
                        ['title' => 'Concept', 'desc' => 'ร่างแนวคิดและทิศทางภาพ 2-3 แบบให้เลือก'],
                        ['title' => 'Design', 'desc' => 'ออกแบบชิ้นงานจริงตาม Concept ที่เลือก'],
                        ['title' => 'Revision', 'desc' => 'ปรับแก้ตามฟีดแบ็กจนกว่าจะพอใจ'],
                        ['title' => 'Delivery', 'desc' => 'ส่งมอบไฟล์ครบทุกฟอร์แมตที่ใช้งานได้จริง'],
                    ],
                    'cta' => ['title' => 'พร้อมสร้างงานกราฟิกที่โดดเด่น?', 'text' => 'ปรึกษาทีมออกแบบของเราได้ฟรี', 'button' => 'ปรึกษาฟรี →'],
                ],
            ],
            [
                'slug' => 'service-web',
                'name' => 'Web Development',
                'description' => 'เว็บไซต์และแอปพลิเคชันที่รวดเร็วปลอดภัย',
                'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
                'content' => [
                    'tags' => 'React · Next.js · WordPress',
                    'subtitle' => 'พัฒนาเว็บไซต์และแอปพลิเคชันที่รวดเร็ว ปลอดภัย รองรับทุกอุปกรณ์ และสามารถขยายต่อได้ในอนาคต ด้วยเทคโนโลยีที่ทันสมัยที่สุด',
                    'stats' => [
                        ['value' => '200+', 'label' => 'เว็บไซต์ที่พัฒนา'],
                        ['value' => '99.9%', 'label' => 'Uptime SLA'],
                        ['value' => '8+', 'label' => 'ปีประสบการณ์'],
                    ],
                    'deliverables' => [
                        ['icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>', 'title' => 'Frontend Development', 'desc' => 'React, Next.js, Vue.js, HTML5/CSS3 Responsive'],
                        ['icon' => '<path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>', 'title' => 'Backend & API', 'desc' => 'Node.js, Laravel, REST API, GraphQL'],
                        ['icon' => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>', 'title' => 'CMS & WordPress', 'desc' => 'WordPress, Headless CMS, Custom Admin Panel'],
                        ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>', 'title' => 'Security & Performance', 'desc' => 'SSL, CDN, Load Optimization, Core Web Vitals'],
                    ],
                    'process' => [
                        ['title' => 'Discovery & Planning', 'desc' => 'วิเคราะห์ความต้องการ กำหนด Scope และเลือก Tech Stack ที่เหมาะสม'],
                        ['title' => 'UI/UX Design', 'desc' => 'ออกแบบ Wireframe และ Mockup ก่อนเริ่ม Code'],
                        ['title' => 'Development', 'desc' => 'พัฒนา Frontend + Backend ตาม Sprint แบบ Agile'],
                        ['title' => 'Testing & QA', 'desc' => 'ทดสอบทุก Functionality, Performance, Security และ Cross-device'],
                        ['title' => 'Launch & Support', 'desc' => 'Deploy ขึ้น Production พร้อม 3 เดือน Post-launch Support'],
                    ],
                    'cta' => ['title' => 'พร้อมสร้างเว็บไซต์ระดับ Enterprise?', 'text' => 'ปรึกษา Technical Architect ของเราฟรี พร้อม Proposal ภายใน 48 ชั่วโมง', 'button' => 'ขอ Proposal ฟรี →'],
                ],
            ],
            [
                'slug' => 'service-marketing',
                'name' => 'Digital Marketing',
                'description' => 'กลยุทธ์การตลาดดิจิทัลที่ขับเคลื่อนด้วยข้อมูล',
                'icon' => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
                'content' => [
                    'tags' => 'SEO · Ads · Social Media',
                    'subtitle' => 'วางกลยุทธ์การตลาดดิจิทัลที่ขับเคลื่อนด้วยข้อมูลและ Data Analytics เพิ่ม ROI, ยอดขาย และ Brand Awareness อย่างวัดผลได้จริง',
                    'stats' => [
                        ['value' => '3x', 'label' => 'เฉลี่ย ROI ที่เพิ่มขึ้น'],
                        ['value' => '50+', 'label' => 'แบรนด์ที่ดูแล'],
                        ['value' => '∞', 'label' => 'แคมเปญที่ปรับได้'],
                    ],
                    'deliverables' => [
                        ['icon' => '<circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>', 'title' => 'SEO', 'desc' => 'On-page/Off-page SEO, Keyword Research, Technical SEO'],
                        ['icon' => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>', 'title' => 'Performance Ads', 'desc' => 'Google Ads, Facebook/Instagram Ads, TikTok Ads'],
                        ['icon' => '<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/>', 'title' => 'Social Media', 'desc' => 'Content Strategy, Community Management, Influencer'],
                        ['icon' => '<path d="M3 3v18h18"/><path d="M18 9l-5 5-4-4-4 4"/>', 'title' => 'Analytics & Reporting', 'desc' => 'GA4, Data Dashboard, Monthly ROI Report'],
                    ],
                    'process' => [
                        ['title' => 'Audit & Strategy', 'desc' => 'วิเคราะห์สถานะปัจจุบันและวางกลยุทธ์การตลาด'],
                        ['title' => 'Content Planning', 'desc' => 'วางแผนคอนเทนต์และปฏิทินแคมเปญ'],
                        ['title' => 'Launch Campaign', 'desc' => 'ยิงแคมเปญพร้อม A/B Testing'],
                        ['title' => 'Optimize', 'desc' => 'ปรับ Budget และ Targeting ตามผลลัพธ์จริง'],
                        ['title' => 'Report', 'desc' => 'สรุปผล ROI และแนะนำแผนต่อไปทุกเดือน'],
                    ],
                    'cta' => ['title' => 'พร้อมเพิ่มยอดขายออนไลน์?', 'text' => 'ปรึกษาทีม Digital Marketing ของเราได้ฟรี', 'button' => 'ปรึกษาฟรี →'],
                ],
            ],
            [
                'slug' => 'service-erp',
                'name' => 'ERP System',
                'description' => 'ระบบจัดการองค์กรครบวงจร เพิ่มประสิทธิภาพธุรกิจ',
                'icon' => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
                'content' => [
                    'tags' => 'Inventory · Finance · HR',
                    'subtitle' => 'ระบบจัดการองค์กรครบวงจร (Enterprise Resource Planning) ที่ช่วยให้ธุรกิจทำงานได้อย่างมีประสิทธิภาพ แม่นยำ และเชื่อมทุก Department เข้าด้วยกัน',
                    'stats' => [
                        ['value' => '40%', 'label' => 'ลดเวลาทำงานเฉลี่ย'],
                        ['value' => '30+', 'label' => 'ระบบที่ติดตั้งแล้ว'],
                        ['value' => '24/7', 'label' => 'Support SLA'],
                    ],
                    'deliverables' => [
                        ['icon' => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>', 'title' => 'Inventory Management', 'desc' => 'จัดการสต๊อกสินค้าและคลังสินค้าแบบ Real-time'],
                        ['icon' => '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>', 'title' => 'Finance & Accounting', 'desc' => 'บัญชี การเงิน ใบแจ้งหนี้ และรายงานภาษี'],
                        ['icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>', 'title' => 'HR & Payroll', 'desc' => 'จัดการพนักงาน เงินเดือน และการลา'],
                        ['icon' => '<path d="M3 3v18h18"/><path d="M18 9l-5 5-4-4-4 4"/>', 'title' => 'Reporting Dashboard', 'desc' => 'แดชบอร์ดวิเคราะห์ธุรกิจแบบ Real-time'],
                    ],
                    'process' => [
                        ['title' => 'Business Analysis', 'desc' => 'วิเคราะห์ Workflow และ Pain Point ขององค์กร'],
                        ['title' => 'System Design', 'desc' => 'ออกแบบโครงสร้างระบบและฐานข้อมูล'],
                        ['title' => 'Development', 'desc' => 'พัฒนาโมดูลตามลำดับความสำคัญ'],
                        ['title' => 'Data Migration & Training', 'desc' => 'ย้ายข้อมูลเก่าและอบรมทีมงาน'],
                        ['title' => 'Go-live & Support', 'desc' => 'เริ่มใช้งานจริงพร้อมทีม Support 24/7'],
                    ],
                    'cta' => ['title' => 'พร้อมยกระดับการบริหารองค์กร?', 'text' => 'ปรึกษาทีม ERP Consultant ของเราได้ฟรี', 'button' => 'ปรึกษาฟรี →'],
                ],
            ],
            [
                'slug' => 'service-branding',
                'name' => 'Branding',
                'description' => 'สร้างตัวตนแบรนด์ที่จดจำได้และแข็งแกร่ง',
                'icon' => '<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>',
                'content' => [
                    'tags' => 'Logo · Identity · Guideline',
                    'subtitle' => 'สร้างตัวตนของแบรนด์ที่จดจำได้ง่าย มีความหมาย และยืนหยัดได้ในระยะยาว ตั้งแต่โลโก้จนถึง Brand Guideline ฉบับสมบูรณ์',
                    'stats' => [
                        ['value' => '70+', 'label' => 'แบรนด์ที่สร้าง'],
                        ['value' => '15+', 'label' => 'รางวัลที่ได้รับ'],
                        ['value' => '100%', 'label' => 'ลูกค้าแนะนำต่อ'],
                    ],
                    'deliverables' => [
                        ['icon' => '<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>', 'title' => 'Logo Design', 'desc' => 'ออกแบบโลโก้และสัญลักษณ์ที่สื่อถึงแบรนด์'],
                        ['icon' => '<circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>', 'title' => 'Brand Identity', 'desc' => 'สี ฟอนต์ และองค์ประกอบภาพของแบรนด์'],
                        ['icon' => '<path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>', 'title' => 'Brand Guideline', 'desc' => 'คู่มือการใช้งานแบรนด์ฉบับสมบูรณ์'],
                        ['icon' => '<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z"/>', 'title' => 'Brand Strategy', 'desc' => 'วางตำแหน่งแบรนด์และ Tone of Voice'],
                    ],
                    'process' => [
                        ['title' => 'Discovery', 'desc' => 'ทำความเข้าใจธุรกิจ คู่แข่ง และกลุ่มเป้าหมาย'],
                        ['title' => 'Strategy', 'desc' => 'กำหนดตำแหน่งแบรนด์และบุคลิกภาพ'],
                        ['title' => 'Design', 'desc' => 'ออกแบบโลโก้และอัตลักษณ์ภาพ'],
                        ['title' => 'Guideline', 'desc' => 'จัดทำคู่มือการใช้งานแบรนด์'],
                        ['title' => 'Rollout', 'desc' => 'นำแบรนด์ไปใช้จริงในทุกช่องทาง'],
                    ],
                    'cta' => ['title' => 'พร้อมสร้างแบรนด์ที่แข็งแกร่ง?', 'text' => 'ปรึกษาทีม Brand Strategist ของเราได้ฟรี', 'button' => 'ปรึกษาฟรี →'],
                ],
            ],
        ];

        $serviceModels = [];
        foreach ($services as $data) {
            $serviceModels[$data['slug']] = Service::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'icon' => $data['icon'],
                    'banner_image' => PlaceholderImage::make($data['name'], 'Graphic TECH', '#1565C0', '#0D47A1'),
                    'content' => $data['content'],
                ]
            );
        }

        // ---------------------------------------------------------------
        // Banners (homepage promo slider)
        // ---------------------------------------------------------------
        if (Banner::count() === 0) {
            Banner::create([
                'title' => 'สร้างแบรนด์ให้แข็งแกร่งด้วยดีไซน์และเทคโนโลยี',
                'subtitle' => 'Creative × Technology Studio ระดับมืออาชีพ',
                'image' => PlaceholderImage::make('Graphic TECH', 'Creative x Technology Studio', '#2196F3', '#0D47A1'),
                'link' => '#contact',
                'active' => true,
            ]);
            Banner::create([
                'title' => 'ยกระดับธุรกิจของคุณด้วยบริการครบวงจร',
                'subtitle' => 'UI/UX, Graphic Design, Web Development, Digital Marketing & ERP System',
                'image' => PlaceholderImage::make('บริการครบวงจร', 'UI/UX - Web - Marketing - ERP', '#1976D2', '#0A3880'),
                'link' => '#services',
                'active' => true,
            ]);
        }

        // ---------------------------------------------------------------
        // Portfolio (linked to services via service_id)
        // ---------------------------------------------------------------
        if (Portfolio::count() === 0) {
            $items = [
                ['title' => 'Mandarin Oriental E-Commerce', 'category' => 'Web Development', 'slug' => 'service-web', 'tags' => ['React', 'Node.js', 'E-Commerce'], 'year' => 2024, 'description' => 'ระบบ E-Commerce ระดับพรีเมียมสำหรับธุรกิจโรงแรมและบริการ หรูหราและใช้งานง่าย'],
                ['title' => 'Novae Brand Identity', 'category' => 'Branding', 'slug' => 'service-branding', 'tags' => ['Logo', 'Brand Identity', 'Stationery'], 'year' => 2024, 'description' => 'ออกแบบอัตลักษณ์แบรนด์แบบครบวงจร สร้างภาพจำที่ทันสมัยและโดดเด่น'],
                ['title' => 'FlowMed Patient App', 'category' => 'UI/UX Design', 'slug' => 'service-uiux', 'tags' => ['Figma', 'Mobile App', 'Healthcare'], 'year' => 2024, 'description' => 'แอปพลิเคชันสำหรับผู้ป่วยและบุคลากรทางการแพทย์ ดีไซน์ใช้งานง่าย เน้น User Experience'],
                ['title' => 'LogiPro ERP Dashboard', 'category' => 'ERP System', 'slug' => 'service-erp', 'tags' => ['ERP', 'Dashboard', 'Logistics'], 'year' => 2023, 'description' => 'ระบบบริหารจัดการองค์กรด้านโลจิสติกส์ ติดตามสถานะแบบ Real-time'],
                ['title' => 'Siam Collection Campaign', 'category' => 'Graphic Design', 'slug' => 'service-graphic', 'tags' => ['Campaign', 'Print', 'Digital'], 'year' => 2023, 'description' => 'แคมเปญกราฟิกสำหรับคอลเลกชันใหม่ สื่อสารผ่านสื่อพิมพ์และดิจิทัล'],
                ['title' => 'Bloom Beauty Digital Campaign', 'category' => 'Digital Marketing', 'slug' => 'service-marketing', 'tags' => ['Social Media', 'Ads', 'Content'], 'year' => 2023, 'description' => 'แคมเปญการตลาดดิจิทัลที่เพิ่มยอดขายออนไลน์และการรับรู้แบรนด์'],
                ['title' => 'ArtSpace Gallery Website', 'category' => 'Web Development', 'slug' => 'service-web', 'tags' => ['CMS', 'Gallery', 'Animation'], 'year' => 2023, 'description' => 'เว็บไซต์แกลเลอรีศิลปะพร้อมระบบจัดการเนื้อหาและแอนิเมชันที่ลื่นไหล'],
                ['title' => 'Kinto Coffee Brand System', 'category' => 'Branding', 'slug' => 'service-branding', 'tags' => ['Packaging', 'Brand System', 'F&B'], 'year' => 2023, 'description' => 'ระบบแบรนด์ครบวงจรสำหรับร้านกาแฟ ตั้งแต่โลโก้จนถึงบรรจุภัณฑ์'],
                ['title' => 'ReBank Mobile Banking UX', 'category' => 'UI/UX Design', 'slug' => 'service-uiux', 'tags' => ['Fintech', 'Mobile', 'UX Research'], 'year' => 2022, 'description' => 'ออกแบบประสบการณ์ผู้ใช้แอปธนาคารบนมือถือ เน้นความปลอดภัยและใช้งานง่าย'],
            ];

            foreach ($items as $item) {
                Portfolio::create([
                    'service_id' => $serviceModels[$item['slug']]->id ?? null,
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'image' => PlaceholderImage::make($item['title'], $item['category']),
                    'tags' => $item['tags'],
                    'year' => $item['year'],
                    'description' => $item['description'],
                ]);
            }
        }

        // ---------------------------------------------------------------
        // Sample posters (promotional images scoped to a service)
        // ---------------------------------------------------------------
        if (Poster::count() === 0) {
            Poster::create([
                'title' => 'โปรโมชั่นทำเว็บไซต์ต้อนรับปีใหม่',
                'image' => PlaceholderImage::make('โปรโมชั่นพิเศษ', 'Web Development', '#0D47A1', '#1976D2'),
                'link' => '#contact',
                'service_id' => $serviceModels['service-web']->id,
                'active' => true,
                'sort_order' => 1,
            ]);
            Poster::create([
                'title' => 'แพ็กเกจ Branding เริ่มต้นสำหรับ SME',
                'image' => PlaceholderImage::make('แพ็กเกจ Branding', 'สำหรับ SME', '#1976D2', '#0A3880'),
                'link' => '#contact',
                'service_id' => $serviceModels['service-branding']->id,
                'active' => true,
                'sort_order' => 1,
            ]);
        }

        // ---------------------------------------------------------------
        // Testimonials
        // ---------------------------------------------------------------
        if (Testimonial::count() === 0) {
            $testimonials = [
                ['name' => 'ณัฐชา จันทร์เพ็ญ', 'position' => 'Marketing Director', 'company' => 'Mandarin Oriental', 'comment' => 'ทีมงานเข้าใจโจทย์ธุรกิจตั้งแต่การพูดคุยครั้งแรก ผลงานที่ได้เกินความคาดหวัง ทั้งดีไซน์และประสิทธิภาพของเว็บไซต์ใหม่ ยอดขายออนไลน์เติบโตขึ้นชัดเจน', 'avatar' => 'ณC', 'rating' => 5],
                ['name' => 'ธนกร กิตติวัฒน์', 'position' => 'COO', 'company' => 'LogiPro Logistics', 'comment' => 'ระบบ ERP ที่ Graphic TECH พัฒนาให้ช่วยลดเวลาทำงานด้าน Inventory ไปกว่าครึ่ง ทีมซัพพอร์ตตอบไวและแก้ปัญหาให้ทันทีทุกครั้งที่ติดต่อไป', 'avatar' => 'ธK', 'rating' => 5],
                ['name' => 'พิมพ์ชนก สายชล', 'position' => 'Founder', 'company' => 'Siam Collection', 'comment' => 'Rebrand ครั้งนี้ทำให้แบรนด์เราดูมืออาชีพขึ้นมาก ลูกค้าเก่าทักมาชมเยอะมาก ทีมออกแบบฟังความต้องการและปรับจนกว่าจะได้งานที่ใช่ที่สุด', 'avatar' => 'พS', 'rating' => 5],
                ['name' => 'อรวรรณ วงศ์สุริยะ', 'position' => 'Product Manager', 'company' => 'FlowMed', 'comment' => 'แอปมือถือที่ออกแบบให้ผู้ป่วยใช้งานง่ายมาก ทีม UX ลงพื้นที่ทำ Research จริง ไม่ใช่แค่ออกแบบตามความสวยงามอย่างเดียว', 'avatar' => 'อW', 'rating' => 5],
                ['name' => 'กันตินันท์ ปิยะวงศ์', 'position' => 'Founder', 'company' => 'Bloom Beauty', 'comment' => 'แคมเปญการตลาดที่ทำให้เห็นตัวเลข ROI ชัดเจนทุกเดือน ทีมงานอัปเดตผลลัพธ์และปรับกลยุทธ์ให้เร็วตามสถานการณ์ตลาดจริง', 'avatar' => 'กP', 'rating' => 5],
                ['name' => 'ชัยวัฒน์ ตันติเวชกุล', 'position' => 'Owner', 'company' => 'Kinto Coffee', 'comment' => 'งานพิมพ์และแพคเกจจิ้งออกมาคุณภาพดีมาก สีตรงตาม Brand Guideline ทุกจุด ประสานงานง่าย ตอบไว แนะนำเลยครับ', 'avatar' => 'ชT', 'rating' => 5],
            ];

            foreach ($testimonials as $t) {
                Testimonial::create($t);
            }
        }

        // ---------------------------------------------------------------
        // Sample inbox message
        // ---------------------------------------------------------------
        if (Message::count() === 0) {
            Message::create([
                'name' => 'สมชาย ใจดี',
                'email' => 'somchai@example.com',
                'phone' => '081-234-5678',
                'service' => 'Web Development',
                'subject' => 'สอบถามราคาทำเว็บไซต์ E-Commerce',
                'message' => 'สนใจพัฒนาเว็บไซต์ขายสินค้าออนไลน์ อยากสอบถามระยะเวลาและประมาณการราคาครับ',
                'read' => false,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Message;
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

        // Seed Banners
        if (Banner::count() === 0) {
            Banner::create([
                'title' => 'สร้างแบรนด์ให้แข็งแกร่งด้วยดีไซน์และเทคโนโลยี',
                'subtitle' => 'Creative × Technology Studio ระดับมืออาชีพ',
                'image' => 'assets/images/brand/bg-hero.jpg',
                'link' => '#contact',
                'active' => true,
            ]);
            Banner::create([
                'title' => 'ยกระดับธุรกิจของคุณด้วยบริการครบวงจร',
                'subtitle' => 'UI/UX, Graphic Design, Web Development, Digital Marketing & ERP System',
                'image' => 'assets/images/portfolio/web-mandarin.jpg',
                'link' => '#services',
                'active' => true,
            ]);
        }

        // Seed Portfolio
        if (Portfolio::count() === 0) {
            Portfolio::create([
                'title' => 'Mandarin Oriental E-Commerce',
                'category' => 'Web Development',
                'image' => 'assets/images/portfolio/web-mandarin.jpg',
                'tags' => ['React', 'Node.js', 'E-Commerce'],
                'year' => 2024,
                'description' => 'ระบบ E-Commerce ระดับพรีเมียมสำหรับธุรกิจโรงแรมและบริการ หรูหราและใช้งานง่าย',
            ]);
            Portfolio::create([
                'title' => 'Novae Brand Identity',
                'category' => 'Branding',
                'image' => 'assets/images/portfolio/logo-novae.jpg',
                'tags' => ['Logo', 'Brand Identity', 'Stationery'],
                'year' => 2024,
                'description' => 'ออกแบบอัตลักษณ์แบรนด์แบบครบวงจร สร้างภาพจำที่ทันสมัยและโดดเด่น',
            ]);
            Portfolio::create([
                'title' => 'FlowMed Patient App',
                'category' => 'UI/UX Design',
                'image' => 'assets/images/portfolio/uiux-flowmed.jpg',
                'tags' => ['Figma', 'Mobile App', 'Healthcare'],
                'year' => 2024,
                'description' => 'แอปพลิเคชันสำหรับผู้ป่วยและบุคลากรทางการแพทย์ ดีไซน์ใช้งานง่าย เน้น User Experience',
            ]);
            Portfolio::create([
                'title' => 'LogiPro ERP Dashboard',
                'category' => 'ERP System',
                'image' => 'assets/images/portfolio/erp-logipro.jpg',
                'tags' => ['ERP', 'Dashboard', 'Logistics'],
                'year' => 2023,
                'description' => 'ระบบบริหารจัดการองค์กรด้านโลจิสติกส์ ติดตามสถานะแบบ Real-time',
            ]);
        }

        // Seed Testimonials
        if (Testimonial::count() === 0) {
            Testimonial::create([
                'name' => 'ณิชชา ธนันต์พิสิฐ',
                'position' => 'Marketing Director',
                'company' => 'Mandarin Oriental',
                'comment' => 'ทีมงานเข้าใจไอเดียธุรกิจดีมาก ผลงานออกมาสวยงาม ตรงใจ และเพิ่มอัตราการสั่งซื้อของเว็บไซต์ได้อย่างชัดเจน',
                'avatar' => 'ณC',
                'rating' => 5,
            ]);
            Testimonial::create([
                'name' => 'ธนกร กิตติวัฒน์',
                'position' => 'COO',
                'company' => 'LogiPro Logistics',
                'comment' => 'ระบบ ERP ที่ Graphic TECH พัฒนาให้ ช่วยลดเวลาการทำงานด้าน Inventory ไปกว่าครึ่ง ทีมงานซัพพอร์ตไวและแก้ปัญหาได้ดีมากครับ',
                'avatar' => 'ธK',
                'rating' => 5,
            ]);
        }

        // Seed Messages
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

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - ข้อผิดพลาดเซิร์ฟเวอร์</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', 'Sarabun', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff6b6b, #ff9cd2);
            overflow: hidden;
            position: relative;
        }

        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            opacity: 0.5;
            animation: rise 10s infinite ease-in;
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.5;
            }
            100% {
                transform: translateY(-1000px) scale(1.5);
                opacity: 0;
            }
        }

        .error-container {
            background: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            z-index: 1;
            position: relative;
            backdrop-filter: blur(5px);
        }

        .error-code {
            font-size: 8rem;
            font-weight: 900;
            margin-bottom: 20px;
            background: linear-gradient(to right, #ff3a3a, #ff7eb6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .error-title {
            font-size: 2rem;
            color: #444;
            margin-bottom: 20px;
        }

        .error-message {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .home-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(to right, #ff3a3a, #ff7eb6);
            color: white;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .home-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .server {
            font-size: 4rem;
            animation: shake 4s ease-in-out infinite;
            margin: 20px 0;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
            }
        }

        .error-details {
            background-color: rgba(255, 58, 58, 0.1);
            border-left: 4px solid #ff3a3a;
            padding: 15px;
            margin-bottom: 25px;
            text-align: left;
            border-radius: 0 5px 5px 0;
        }

        .error-details h3 {
            color: #d32f2f;
            margin-bottom: 10px;
        }

        .error-details ul {
            padding-left: 20px;
            color: #666;
        }

        .error-details li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="bubbles" id="bubbles"></div>
    
    <div class="error-container">
        <div class="error-code">500</div>
        <div class="server">🖥️</div>
        <h1 class="error-title">เซิร์ฟเวอร์มีข้อผิดพลาด</h1>
        <p class="error-message">ขออภัย เกิดข้อผิดพลาดในการประมวลผลของเซิร์ฟเวอร์ ทีมงานของเรากำลังแก้ไขปัญหานี้อยู่</p>
        
        <div class="error-details">
            <h3>สาเหตุที่อาจเป็นไปได้:</h3>
            <ul>
                <li>เซิร์ฟเวอร์อาจกำลังทำงานหนักเกินไป</li>
                <li>เกิดข้อผิดพลาดในการประมวลผลคำขอของคุณ</li>
                <li>มีปัญหาเกี่ยวกับการเชื่อมต่อฐานข้อมูล</li>
                <li>เซิร์ฟเวอร์กำลังอยู่ในช่วงการบำรุงรักษา</li>
            </ul>
        </div>
        
        <a href="/" class="home-button">กลับไปหน้าหลัก</a>
    </div>

    <script>
        // สร้างฟองลอย
        const bubblesContainer = document.getElementById('bubbles');
        const bubbleCount = 30;
        
        for (let i = 0; i < bubbleCount; i++) {
            const bubble = document.createElement('div');
            bubble.classList.add('bubble');
            
            // ขนาดสุ่ม
            const size = Math.random() * 100 + 20;
            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;
            
            // ตำแหน่งสุ่ม
            bubble.style.left = `${Math.random() * 100}%`;
            
            // ระยะเวลาลอยขึ้นสุ่ม
            const duration = Math.random() * 10 + 5;
            bubble.style.animationDuration = `${duration}s`;
            
            // ดีเลย์สุ่ม
            const delay = Math.random() * 5;
            bubble.style.animationDelay = `${delay}s`;
            
            bubblesContainer.appendChild(bubble);
        }
    </script>
</body>
</html>
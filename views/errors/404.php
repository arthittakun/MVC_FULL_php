<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - ไม่พบหน้าที่คุณต้องการ</title>
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
            background: linear-gradient(45deg, #ff9cd2, #a4c7ff);
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
            background: linear-gradient(to right, #ff7eb6, #7eb3ff);
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
            background: linear-gradient(to right, #ff7eb6, #7eb3ff);
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

        .rocket {
            font-size: 4rem;
            animation: float 4s ease-in-out infinite;
            margin: 20px 0;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }
    </style>
</head>
<body>
    <div class="bubbles" id="bubbles"></div>
    
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="rocket">🚀</div>
        <h1 class="error-title">ไม่พบหน้าที่คุณต้องการ</h1>
        <p class="error-message">หน้าเว็บที่คุณกำลังค้นหาอาจถูกลบไปแล้ว มีการเปลี่ยนชื่อ หรือไม่สามารถเข้าถึงได้ชั่วคราว</p>
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
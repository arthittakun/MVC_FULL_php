<style>
.social-box-container {
    padding: 4rem 0;
}

.social-box {
    background: #FFFFFF;
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #98D8EF;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.social-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(to right, #EAE2C6, #ADA991);
}

.social-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(152, 216, 239, 0.2);
}

.social-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #333333;
}

.social-box:hover .social-icon {
    animation: bounce 0.5s;
}

.social-title {
    font-size: 1.5rem;
    color: #333333;
    margin-bottom: 1rem;
    font-weight: 600;
}

.social-description {
    color: #666666;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
}

.social-link {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}

.facebook-box .social-link {
    background: linear-gradient(45deg, #3b5998, #5f7ec1);
    color: white;
}

.telegram-box .social-link {
    background: linear-gradient(45deg, #0088cc, #29b6f6);
    color: white;
}

.discord-box .social-link {
    background: linear-gradient(45deg, #7289da, #99aab5);
    color: white;
}

.forum-box .social-link {
    background: linear-gradient(45deg, #ADA991, #BFBBA9);
    color: white;
}

.social-link:hover {
    transform: translateY(-2px);
    opacity: 0.9;
    color: white;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
</style>

<div class="social-box-container">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="social-box facebook-box">
                    <i class="fab fa-facebook social-icon"></i>
                    <h3 class="social-title">Facebook</h3>
                    <p class="social-description">ติดตามข่าวสารและอัพเดทล่าสุดผ่าน Facebook ของเรา</p>
                    <a href="#" class="social-link">เข้าร่วมกลุ่ม</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="social-box telegram-box">
                    <i class="fab fa-telegram social-icon"></i>
                    <h3 class="social-title">Telegram</h3>
                    <p class="social-description">รับข่าวสารด่วนและการแจ้งเตือนผ่าน Telegram</p>
                    <a href="#" class="social-link">เข้าร่วมช่อง</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="social-box discord-box">
                    <i class="fab fa-discord social-icon"></i>
                    <h3 class="social-title">Discord</h3>
                    <p class="social-description">พูดคุยและแลกเปลี่ยนความคิดเห็นกับชุมชน</p>
                    <a href="#" class="social-link">เข้าร่วม Server</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="social-box forum-box">
                    <i class="fas fa-comments social-icon"></i>
                    <h3 class="social-title">Forum Blog</h3>
                    <p class="social-description">แบ่งปันประสบการณ์และพูดคุยในฟอรัมของเรา</p>
                    <a href="#" class="social-link">เข้าสู่ฟอรัม</a>
                </div>
            </div>
        </div>
    </div>
</div>

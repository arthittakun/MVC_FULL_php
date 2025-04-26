<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="#">
      <i class="fas fa-blog fa-lg me-2"></i>
      Blog
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-start w-100">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home me-1"></i> หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-laptop me-1"></i> ตัวอย่างเว็บไซต์</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> บริการของเรา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact"><i class="fas fa-envelope me-1"></i> ติดต่อเรา</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact"><i class="fas fa-users me-1"></i> ชุมชน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-file-contract me-1"></i> เงื่อนไข</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
.custom-navbar {
    background: linear-gradient(135deg, #98D8EF 60%, #EAE2C6);
    border-bottom: 2px solid #ADA991;
}

.custom-navbar .navbar-brand {
  color: #333333;
  font-weight: 600;
}

.navbar-nav {
  display: flex;
  justify-content: center;
  width: 100%;
  text-align: center;
}

.custom-navbar .nav-link {
  color: #444444 !important;
  margin: 0 15px;
  padding: 0.5rem 1rem;
  font-weight: 500;
  transition: all 0.3s ease;
  text-align: center;
}

.custom-navbar .nav-link:hover {
    color: #333333 !important;
    transform: translateY(-2px);
    background: linear-gradient(to right, rgba(234, 226, 198, 0.2), rgba(191, 187, 169, 0.2));
    border-radius: 5px;
}

.custom-navbar .nav-link.active {
    color: #333333 !important;
    border-bottom: 2px solid #ADA991;
    background: linear-gradient(to right, rgba(234, 226, 198, 0.1), rgba(191, 187, 169, 0.1));
}

.navbar-toggler {
  border-color: #333333;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28173, 169, 145, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

@media (max-width: 991.98px) {
  .navbar-nav {
    padding: 1rem 0;
  }
  
  .nav-item {
    width: 100%;
  }

  .custom-navbar .nav-link {
    text-align: left;
    padding: 0.8rem 1rem;
    margin: 0;
  }

  .custom-navbar .nav-link.active {
    border-bottom: none;
    border-left: 3px solid #ADA991;
    background: rgba(234, 226, 198, 0.2);
  }
}
</style>

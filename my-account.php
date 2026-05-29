<?php
$pageTitle = "My Account - industry.co.zw";
require_once __DIR__ . '/includes/head.php';
?>
</head>

<body class="index-page">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="main" style="padding: 100px 0;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-body p-5">
              <h2 class="text-center mb-4" id="formTitle">Sign In</h2>

              <form id="authForm">
                <div id="nameGroup" class="mb-3" style="display:none;">
                  <label class="form-label">Full Name</label>
                  <input type="text" id="name" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" id="password" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-success" id="submitBtn">Sign In</button>
                </div>
              </form>

              <div class="text-center mt-4">
                <p id="toggleMsg">Don't have an account? <a href="#" id="toggleAuth">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script>
    const toggleAuth = document.getElementById('toggleAuth');
    const formTitle = document.getElementById('formTitle');
    const nameGroup = document.getElementById('nameGroup');
    const submitBtn = document.getElementById('submitBtn');
    const toggleMsg = document.getElementById('toggleMsg');

    let isLogin = true;

    // Check URL for register flag
    if (window.location.search.includes('register')) {
      switchToRegister();
    }

    toggleAuth.addEventListener('click', (e) => {
      e.preventDefault();
      if (isLogin) {
        switchToRegister();
      } else {
        switchToLogin();
      }
    });

    function switchToRegister() {
      isLogin = false;
      formTitle.innerText = 'Register';
      nameGroup.style.display = 'block';
      submitBtn.innerText = 'Register';
      toggleMsg.innerHTML = 'Already have an account? <a href="#" id="toggleAuth">Sign In</a>';
      attachToggleEvent();
    }

    function switchToLogin() {
      isLogin = true;
      formTitle.innerText = 'Sign In';
      nameGroup.style.display = 'none';
      submitBtn.innerText = 'Sign In';
      toggleMsg.innerHTML = "Don't have an account? <a href=\"#\" id=\"toggleAuth\">Register</a>";
      attachToggleEvent();
    }

    function attachToggleEvent() {
        document.getElementById('toggleAuth').addEventListener('click', (e) => {
            e.preventDefault();
            isLogin ? switchToRegister() : switchToLogin();
        });
    }

    document.getElementById('authForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const action = isLogin ? 'login' : 'register';
      const data = {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        name: document.getElementById('name').value
      };

      try {
        const res = await fetch(`api/public/auth.php?action=${action}`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        });
        const result = await res.json();
        if (result.status === 'success') {
          alert(result.message);
          if (isLogin) window.location.href = '/';
          else switchToLogin();
        } else {
          alert(result.message);
        }
      } catch (err) {
        alert('An error occurred');
      }
    });
  </script>
</body>
</html>

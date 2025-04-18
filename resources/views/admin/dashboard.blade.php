<!DOCTYPE html>
<html lang="uz">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Travel Blog</title>

  <!--  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--  -->
  <style>
    * { 
      box-sizing: border-box; 
    }
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 20px; 
      background: black; }

    h1 { 
      text-align: center; 
      color: white;
    }

    .blog-container {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 20px;
    }

    @media(min-width: 768px) {
      .blog-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media(min-width: 1024px) {
      .blog-container {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    .blog-card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: relative;
    }

    .blog-card img,
    .blog-card video {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .blog-card video {
      background: #000;
    }

    .blog-content {
      padding: 15px;
    }

    .blog-content h3 {
      margin: 0 0 10px;
    }

    .blog-content p {
      color: #555;
    }

    .blog-content button {
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #007BFF;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    .delete-btn {
      background: red;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      position: relative;
      display: inline-block;
      left: 100px;
      top: -55px;
    }

    .admin-panel {
      margin-top: 40px;
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      max-width: 400px;  
      margin-left: auto;
      margin-right: auto;
    }

    .admin-panel h2 {
      margin-top: 0;
      font-size: 18px;  
    }

    .admin-panel input, .admin-panel textarea {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 18px; 
    }

    .admin-panel button {
      width: 100%;
      color: black;
      padding: 12px 12px;
      border: 1px solid gray;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;  
    }

  </style>
</head>
<body>

  <h1>Sayohat Bloglari</h1>
  <div class="blog-container" id="blogContainer">
   
  </div>

  <div class="admin-panel">
    <h2>Blog qo‘shish (Admin panel)</h2>
    <input type="text" id="title" placeholder="Sarlavha kiriting">
    <textarea id="description" placeholder="Tavsif kiriting"></textarea>
    <input type="file" id="mediaUpload" accept="image/*,video/*">
    <button class="btn btn-outline-dark" onclick="addBlog()">Blogni qo‘shish</button>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      fetch('/admin/blogs')
        .then(res => res.json())
        .then(data => {
          data.forEach(blog => addBlogToPage(blog));
        });
    });
  
    function addBlog() {
      console.log("Blog qo'shish boshlandi");
      const title = document.getElementById("title").value;
      const description = document.getElementById("description").value;
      const mediaInput = document.getElementById("mediaUpload");
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
      if (!title || !description || !mediaInput.files[0]) {
        alert("Iltimos, barcha maydonlarni to‘ldiring.");
        return;
      }
  
      const formData = new FormData();
      formData.append("title", title);
      formData.append("description", description);
      formData.append("media", mediaInput.files[0]);
  
      fetch('/admin/blogs', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken
        },
        body: formData
      })
      .then(res => res.json())
      .then(blog => {
        addBlogToPage(blog);
        document.getElementById("title").value = '';
        document.getElementById("description").value = '';
        document.getElementById("mediaUpload").value = '';
      });
    }
  
    function addBlogToPage(blog) {
      const blogContainer = document.getElementById("blogContainer");
      const newCard = document.createElement("div");
      newCard.className = "blog-card";
  
      let mediaElement = "";
      const mediaUrl = `/storage/${blog.media_path}`;
      if (blog.media_type.startsWith("image/")) {
        mediaElement = `<img src="${mediaUrl}" alt="${blog.title}" />`;
      } else if (blog.media_type.startsWith("video/")) {
        mediaElement = `<video src="${mediaUrl}" controls></video>`;
      }
  
      newCard.innerHTML = `
        ${mediaElement}
        <div class="blog-content">
          <h3>${blog.title}</h3>
          <p>${blog.description}</p>
          <button>Batafsil</button>
        </div>
        <button class="delete-btn" onclick="deleteBlog(${blog.id}, this)">O'chirish</button>
      `;
      blogContainer.prepend(newCard);
    }
  
    function deleteBlog(id, button) {
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
      fetch(`/admin/blogs/${id}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': csrfToken,
          'Accept': 'application/json'
        }
      })
      .then(res => {
        if (res.ok) {
          button.closest('.blog-card').remove();
        }
      });
    }
  </script>

</body>
</html>
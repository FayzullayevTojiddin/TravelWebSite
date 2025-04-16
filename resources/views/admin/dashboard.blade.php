<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Travel Blog</title>
  <style>
    * { box-sizing: border-box; }
    body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }

    h1 { text-align: center; }

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
      top: -44px;
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
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px; 
    }

    .admin-panel button {
      background: green;
      color: white;
      padding: 8px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;  
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
    <button onclick="addBlog()">Blogni qo‘shish</button>
  </div>

  <script>
 
    document.addEventListener('DOMContentLoaded', () => {
      const savedBlogs = JSON.parse(localStorage.getItem('blogs')) || [];
      savedBlogs.forEach(blog => {
        addBlogToPage(blog);
      });
    });

    
    function addBlog() {
      const title = document.getElementById("title").value;
      const description = document.getElementById("description").value;
      const mediaInput = document.getElementById("mediaUpload");
      const blogContainer = document.getElementById("blogContainer");

      if (!title || !description || !mediaInput.files[0]) {
        alert("Iltimos, barcha maydonlarni to‘ldiring.");
        return;
      }

      const file = mediaInput.files[0];
      const fileType = file.type;

      const reader = new FileReader();
      reader.onload = function(e) {
        const newBlog = {
          title: title,
          description: description,
          media: e.target.result,
          fileType: fileType
        };

        // Blogni sahifaga qo'shish va localStorage ga saqlash
        addBlogToPage(newBlog);
        saveBlogToLocalStorage(newBlog);

        // Formani tozalash
        document.getElementById("title").value = '';
        document.getElementById("description").value = '';
        document.getElementById("mediaUpload").value = '';
      };
      reader.readAsDataURL(file);
    }

    // Blogni sahifaga qo'shish
    function addBlogToPage(blog) {
      const blogContainer = document.getElementById("blogContainer");
      const newCard = document.createElement("div");
      newCard.className = "blog-card";

      let mediaElement = "";
      if (blog.fileType.startsWith("image/")) {
        mediaElement = `<img src="${blog.media}" alt="${blog.title}" />`;
      } else if (blog.fileType.startsWith("video/")) {
        mediaElement = `<video src="${blog.media}" controls></video>`;
      }

      newCard.innerHTML = `
        ${mediaElement}
        <div class="blog-content">
          <h3>${blog.title}</h3>
          <p>${blog.description}</p>
          <button>Batafsil</button>
        </div>
        <button class="delete-btn" onclick="deleteBlog(this)">O'chirish</button>
      `;
      blogContainer.prepend(newCard);
    }

    // Blogni localStorage ga saqlash
    function saveBlogToLocalStorage(blog) {
      const savedBlogs = JSON.parse(localStorage.getItem('blogs')) || [];
      savedBlogs.push(blog);
      localStorage.setItem('blogs', JSON.stringify(savedBlogs));
    }

    // Blogni o'chirish
    function deleteBlog(button) {
      const blogCard = button.closest(".blog-card");
      const blogTitle = blogCard.querySelector("h3").textContent;

      // LocalStorage dan o'chirish
      let savedBlogs = JSON.parse(localStorage.getItem('blogs'));
      savedBlogs = savedBlogs.filter(blog => blog.title !== blogTitle);
      localStorage.setItem('blogs', JSON.stringify(savedBlogs));

      blogCard.remove();
    }
  </script>

</body>
</html>

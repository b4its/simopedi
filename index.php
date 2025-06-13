<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Document</title>
    <style>
        body{
            background: black;
        }

        svg{
            display:block;
        }

        .button-monochrome {
            background: white;
            color: black;
            height: 50px;
            text-decoration: none;
            border-radius: 1em;
            transition: all 2s ease;
            border: none;
            
            /* Flexbox for centering */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .button-monochrome:hover {
            background: black;
            color: white;
            border: 1px solid white;
            box-shadow: 0 0 15px 5px rgba(255, 255, 255, 0.7);
        }

        .button-monochrome:focus {
            background: black;
            transition: all 2s ease;
            color: white;
            border: 1px solid white;
            box-shadow: 0 0 15px 5px rgba(0, 0, 255, 0.7); /* glow biru */
            outline: 2px solid rgba(0, 0, 255, 0.6);       /* tambahan fokus */
            outline-offset: 2px;
        }


        @keyframes bounceDown {
        0%, 100% {
            transform: translate(-50%, 0);
        }
        50% {
            transform: translate(-50%, 10px); /* turun 10px lalu balik */
        }
        }

        .bounce-down {
        animation: bounceDown 1.5s ease-in-out infinite;
        }
    </style>
</head>
<body>
<!-- headline -->
<div>
<div class="position-relative vh-100 d-flex justify-content-center align-items-center"
     style="background: url('https://static.vecteezy.com/system/resources/thumbnails/007/448/799/small_2x/abstract-earth-in-space-galaxy-3d-rendering-elements-of-this-image-furnished-by-nasa-photo.jpg');
            background-position: center;
            background-repeat: no-repeat;
            ">
    <h3 class="text-center fw-bolder text-white position-absolute top-50 start-50 translate-middle">
        Arjuna
    </h3>

    <!-- Tombol Scroll -->
    <a href="#konten"
    class="button-monochrome text-center col-8 col-md-4 col-sm-8 col-lg-2 p-2 fw-bolder position-absolute"
    style="top: 79%; left: 50%; transform: translateX(-50%);">
        Scroll Down
    </a>

    <!-- Ikon di bawah tombol -->
    <div class="fw-bold position-absolute bounce-down"
        style="top: 90%; left: 50%; transform: translateX(-50%); color: white; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
    </div>

</div>



<!-- SVG -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 400">
  <defs>
    <linearGradient id="gradientBlackToBlue" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#000000"/>
      <stop offset="40%" stop-color="rgba(0, 0, 255, 0.7)"/>
      <stop offset="100%" stop-color="rgba(0, 0, 255, 0.7)"/>
    </linearGradient>
  </defs>
  <path fill="url(#gradientBlackToBlue)" 
    d="M0,256L34.3,261.3C68.6,267,137,277,206,245.3C274.3,213,343,139,411,106.7C480,75,549,85,617,122.7C685.7,160,754,224,823,229.3C891.4,235,960,181,1029,170.7C1097.1,160,1166,192,1234,176C1302.9,160,1371,96,1406,64L1440,32L1440,400L1405.7,400C1371.4,400,1303,400,1234,400C1165.7,400,1097,400,1029,400C960,400,891,400,823,400C754.3,400,686,400,617,400C548.6,400,480,400,411,400C342.9,400,274,400,206,400C137.1,400,69,400,34,400L0,400Z">
  </path>
</svg>


<!-- Background Section -->
<div style="background:rgba(0, 0, 255, 0.7); color: white; padding: 20px;">
    <div id="konten">
          <h2 class="text-center">Halo Dunia</h2>
          
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem iusto voluptatem eos quibusdam distinctio vero rerum, ullam illo maxime quis assumenda. Debitis, dolorum voluptatibus autem totam magni esse mollitia nobis sapiente nam? Libero eligendi saepe molestiae praesentium minima assumenda ratione, animi, modi ipsam eaque enim. Quo nisi officia odit quae cum corrupti quis officiis magnam reiciendis non perferendis voluptatibus nobis illum molestias, a nemo. Corrupti, amet expedita aliquam quam veniam alias iure mollitia, cumque quisquam accusamus ipsum aliquid exercitationem nesciunt error eius pariatur nam iste eum quo molestiae! Impedit voluptates expedita, quibusdam hic laborum distinctio unde iste voluptatem, eius corporis consequatur atque id commodi quod magni sequi assumenda tempora, nihil nostrum? Nihil culpa eius nemo totam dolor odio aliquam nam cupiditate cum, molestiae harum porro, amet modi error magnam dolore voluptatum excepturi? Adipisci sapiente atque porro magnam earum. Deleniti et neque dignissimos, tenetur fugit, quidem excepturi eum incidunt culpa laudantium iure id saepe quis maxime nemo numquam expedita? Officia sequi qui velit necessitatibus quaerat, veniam consectetur quae dolorem ad perferendis illum tempora similique hic veritatis laboriosam molestias magni blanditiis! Atque quis hic explicabo, nemo quae ipsam possimus dolor cum provident laboriosam tenetur quaerat optio? Nobis enim eos nihil non facere consequuntur, impedit reiciendis? Tempora odit itaque exercitationem vel debitis vitae ipsum culpa obcaecati delectus pariatur eaque, totam at mollitia consectetur doloribus libero magni consequatur doloremque beatae maiores harum aut numquam deleniti! Possimus dolore assumenda, quos sequi inventore necessitatibus numquam perferendis blanditiis quam asperiores tempora voluptate doloribus eius illum corporis accusamus consequuntur dicta nesciunt consequatur laudantium voluptas. Quam ratione in eaque error quidem harum. Aspernatur aliquid aliquam delectus ab enim mollitia. Dignissimos deserunt saepe qui nobis facilis repellat assumenda nulla recusandae tempora ex aspernatur corporis nisi dolores porro asperiores nostrum voluptatum voluptatibus eligendi, rerum modi? Eligendi officia neque, aperiam, distinctio, doloremque ratione consequuntur reiciendis sapiente totam voluptates magni. Quasi, minus eaque rerum facere voluptates sapiente at pariatur quos aperiam. Distinctio dicta, ipsum rerum quibusdam quaerat sit natus recusandae laudantium doloremque reiciendis molestiae mollitia explicabo libero eos nobis cupiditate cumque dolorem, quam dolores ipsa, nisi voluptas esse quis debitis? Molestiae temporibus sunt tenetur, aspernatur ducimus laudantium rem, ad, consectetur eos saepe adipisci ratione magnam. Quia adipisci tempore consectetur itaque tempora aut nisi sint amet quibusdam dignissimos autem doloremque sed quae, velit quos enim, repellendus consequatur officia, magnam dicta animi. Omnis repellendus amet labore ducimus neque adipisci quod quae culpa, et recusandae delectus voluptas at perspiciatis praesentium, corporis pariatur doloribus dolores tempore. Blanditiis numquam maxime, sed nisi, labore quidem provident quisquam est quo tempore aut nobis cumque tempora nemo? Dolorem illum dignissimos impedit inventore quisquam neque at, ab maiores laborum a dolore, sunt aut, pariatur fugit optio? Officiis atque nemo deleniti dolor? Et, odit facilis! Maxime, consectetur ab sequi similique commodi cum enim magni voluptatibus odio vitae quos nostrum rem iure! Fugit repudiandae cum quisquam suscipit cupiditate aut eum vel eveniet fugiat eos architecto molestias minus voluptatibus, ratione, unde neque? Quasi animi quidem maxime vitae quibusdam dolores quo! Voluptates, sunt. Dicta, numquam libero!
    </div>
</div>

</div>

<!-- javascripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<script>
const querystring_title = "Chuck Norris Ipsum"
const querystring_site = "https://rb-webstudio.go.yj.fr"
const url = `${querystring_site}/chuck-norris-ipsum/`
const querystring_url = url
const share_title = `Je souhaite te partager cet site : ${url}`
const share_content = `Salut,\nJe pense que ce site devrait t'intéresser :\n${url}`

const ctx = {
    'Partager sur Linkedin' : {
        'url' : `https://www.linkedin.com/shareArticle?mini=true&url=${querystring_url}&title=${querystring_title}&source=${querystring_site}`,
        'icon' : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M196.3 512L103.4 512L103.4 212.9L196.3 212.9L196.3 512zM149.8 172.1C120.1 172.1 96 147.5 96 117.8C96 103.5 101.7 89.9 111.8 79.8C121.9 69.7 135.6 64 149.8 64C164 64 177.7 69.7 187.8 79.8C197.9 89.9 203.6 103.6 203.6 117.8C203.6 147.5 179.5 172.1 149.8 172.1zM543.9 512L451.2 512L451.2 366.4C451.2 331.7 450.5 287.2 402.9 287.2C354.6 287.2 347.2 324.9 347.2 363.9L347.2 512L254.4 512L254.4 212.9L343.5 212.9L343.5 253.7L344.8 253.7C357.2 230.2 387.5 205.4 432.7 205.4C526.7 205.4 544 267.3 544 347.7L544 512L543.9 512z"/></svg>`,
    },
    'Partager sur Twitter': {
        'url': `https://twitter.com/intent/tweet?url=${querystring_url}&text=${querystring_title}`,
        'icon' : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M453.2 112L523.8 112L369.6 288.2L551 528L409 528L297.7 382.6L170.5 528L99.8 528L264.7 339.5L90.8 112L236.4 112L336.9 244.9L453.2 112zM428.4 485.8L467.5 485.8L215.1 152L173.1 152L428.4 485.8z"/></svg>`,
    },
    'Partager sur Facebook': {
        'url': `https://www.facebook.com/sharer/sharer.php?u=${querystring_url}`,
        'icon' : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"/></svg>`,
    },
    "Partager à un ami": {
        'url': `mailto:?subject=${share_title}&body=${share_content}`,
        'icon' : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M448 256C501 256 544 213 544 160C544 107 501 64 448 64C395 64 352 107 352 160C352 165.4 352.5 170.8 353.3 176L223.6 248.1C206.7 233.1 184.4 224 160 224C107 224 64 267 64 320C64 373 107 416 160 416C184.4 416 206.6 406.9 223.6 391.9L353.3 464C352.4 469.2 352 474.5 352 480C352 533 395 576 448 576C501 576 544 533 544 480C544 427 501 384 448 384C423.6 384 401.4 393.1 384.4 408.1L254.7 336C255.6 330.8 256 325.5 256 320C256 314.5 255.5 309.2 254.7 304L384.4 231.9C401.3 246.9 423.6 256 448 256z"/></svg>`,
    }
}
</script>
<footer>
    <div class="container">
        <nav>
            {#each Object.entries(ctx) as [key, value]}
                <a href={value.url} target="_blank">
                    <span class="hide">{key}</span>
                    <span class="icon">{@html value.icon}</span>
                </a>
            {/each}
        </nav>
        <div class="text-center">
            <p class="title">Chuck Norris <span>ipsum</span></p>
            <p class="copy"><a href="" target="_blank">RB webstudio</a> &copy; 2026</p>
        </div>
    </div>
</footer>
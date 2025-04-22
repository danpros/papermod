<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language();?>">
<head>
<?php echo head_contents();?>
<?php echo $metatags;?>
<link href="<?php echo theme_path();?>css/stylesheet.css" rel="stylesheet">
<meta name="theme-color" content="#2e2e33">
<meta name="msapplication-TileColor" content="#2e2e33">
<noscript>
<style>
	#theme-toggle,
	.top-link {
		display: none;
	}

</style>
<style>
	@media (prefers-color-scheme: dark) {
		:root {
			--theme: rgb(29, 30, 32);
			--entry: rgb(46, 46, 51);
			--primary: rgb(218, 218, 219);
			--secondary: rgb(155, 156, 157);
			--tertiary: rgb(65, 66, 68);
			--content: rgb(196, 196, 197);
			--code-block-bg: rgb(46, 46, 51);
			--code-bg: rgb(55, 56, 62);
			--border: rgb(51, 51, 51);
		}

		.list {
			background: var(--theme);
		}

		.list:not(.dark)::-webkit-scrollbar-track {
			background: 0 0;
		}

		.list:not(.dark)::-webkit-scrollbar-thumb {
			border-color: var(--theme);
		}
	}

</style>
</noscript>
</head>
<body class="<?php if (is_index() || isset($is_profile)):?>list<?php endif;?> dark" id="top">
<?php if (facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>
<script>
    if (localStorage.getItem("pref-theme") === "dark") {
        document.body.classList.add('dark');
    } else if (localStorage.getItem("pref-theme") === "light") {
        document.body.classList.remove('dark')
    }
</script>

<header class="header">
    <nav class="nav">
        <div class="logo">
            <a href="<?php echo site_url();?>" title="<?php echo blog_title();?>"><?php echo blog_title();?></a>
            <div class="logo-switches">
                <button id="theme-toggle" title="Mode">
                    <svg id="moon" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg id="sun" xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </button>
            </div>
        </div>
        <div id="menu-wrapper">
			<?php echo menu('primary-menu');?>
        </div>
    </nav>
</header>

<main class="main"> 
	<?php echo content();?>
</main>
    
<footer class="footer">
    <span>
	<?php echo copyright();?>
	<br><span>Based on <a href="https://github.com/adityatelange/hugo-PaperMod/" rel="nofollow" target="_blank">Papermod</a></span>
    </span>
</footer>
<a href="#top" aria-label="go to top" title="Go to Top" class="top-link" id="top-link">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 6" fill="currentColor">
        <path d="M12 6H0l6-6z"></path>
    </svg>
</a>

<script>
    let menu = document.getElementById('menu')
    if (menu) {
        menu.scrollLeft = localStorage.getItem("menu-scroll-position");
        menu.onscroll = function () {
            localStorage.setItem("menu-scroll-position", menu.scrollLeft);
        }
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            var id = this.getAttribute("href").substr(1);
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                document.querySelector(`[id='${decodeURIComponent(id)}']`).scrollIntoView({
                    behavior: "smooth"
                });
            } else {
                document.querySelector(`[id='${decodeURIComponent(id)}']`).scrollIntoView();
            }
            if (id === "top") {
                history.replaceState(null, null, " ");
            } else {
                history.pushState(null, null, `#${id}`);
            }
        });
    });

</script>
<script>
    var mybutton = document.getElementById("top-link");
    window.onscroll = function () {
        if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
            mybutton.style.visibility = "visible";
            mybutton.style.opacity = "1";
        } else {
            mybutton.style.visibility = "hidden";
            mybutton.style.opacity = "0";
        }
    };

</script>
<script>
    document.getElementById("theme-toggle").addEventListener("click", () => {
        if (document.body.className.includes("dark")) {
            document.body.classList.remove('dark');
            localStorage.setItem("pref-theme", 'light');
        } else {
            document.body.classList.add('dark');
            localStorage.setItem("pref-theme", 'dark');
        }
    })

</script>
<?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>
</html>

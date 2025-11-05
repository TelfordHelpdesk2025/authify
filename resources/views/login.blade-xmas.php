<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSO Login - Christmas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Mountains+of+Christmas:wght@700&display=swap');

        body {
            font-family: 'Mountains of Christmas', cursive;
            background: linear-gradient(135deg, #0b3d2e 0%, #14532d 50%, #0f766e 100%);
            overflow-x: hidden;
            position: relative;
            cursor: grab;
        }

        .authify-logo {
            text-shadow: 0 4px 15px rgba(185, 28, 28, 0.4);
        }

        /* Snow accumulation base layer */
        .snow-accumulation {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: transparent;
            z-index: 5;
            overflow: visible;
            pointer-events: none;
            transition: height 1.5s ease-out;
        }

        /* White mound effect as snow builds */
        .snow-accumulation::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: -5%;
            width: 110%;
            height: 100%;
            background: linear-gradient(to top, #fff 0%, rgba(255, 255, 255, 0.8) 80%);
            border-radius: 50% 50% 0 0;
            box-shadow: 0 -5px 20px rgba(255, 255, 255, 0.5);
        }

        /* Snowflakes falling */
        .snowflake {
            position: fixed;
            top: -10px;
            color: white;
            font-size: 1.2em;
            opacity: 0.8;
            animation: fall linear forwards;
            z-index: 10;
            pointer-events: none;
        }

        @keyframes fall {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 1;
            }

            90% {
                opacity: 0.8;
            }

            100% {
                transform: translateY(100vh) translateX(20px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
            z-index: 10;
        }

        /* Snow buildup on form edges */
        .form-snow {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.9;
            pointer-events: none;
            z-index: 9;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        .form-snow-top {
            top: -8px;
            width: 100%;
            height: 15px;
            border-radius: 10px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        }

        .form-snow-left {
            left: -8px;
            height: 100%;
            width: 15px;
            border-radius: 10px;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        }

        .form-snow-right {
            right: -8px;
            height: 100%;
            width: 15px;
            border-radius: 10px;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        }

        .form-snow-corner {
            width: 25px;
            height: 25px;
        }

        .form-snow-corner-tl {
            top: -12px;
            left: -12px;
        }

        .form-snow-corner-tr {
            top: -12px;
            right: -12px;
        }

        .form-snow-corner-bl {
            bottom: -12px;
            left: -12px;
        }

        .form-snow-corner-br {
            bottom: -12px;
            right: -12px;
        }

        /* Floating animation */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 5s ease-in-out infinite;
        }

        /* Button hover effect */
        .btn-hover {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #3ad13a 0%, #b91c1c 100%);
            box-shadow: 0 4px 15px 0 rgba(220, 38, 38, 0.4);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px 0 rgba(220, 38, 38, 0.5);
        }

        /* Input focus effect */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
            border-color: #dc2626;
        }

        /* Particles container */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Snow buildup animation */
        @keyframes snowBuildup {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 0.9;
                transform: scale(1);
            }
        }

        .form-snow {
            animation: snowBuildup 2s ease-out forwards;
        }
    </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen px-4 relative">

    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Snow Accumulation -->
    <div class="snow-accumulation" id="snowAccumulation"></div>

    <!-- Animated Snow -->
    <script>
        const snowContainer = document.createElement('div');
        document.body.appendChild(snowContainer);

        const snowAccumulation = document.getElementById('snowAccumulation');
        let accumulationHeight = 0;
        const maxAccumulation = 120; // max height in px
        const accumulationRate = 0.1; // how fast snow builds

        function updateSnowPile() {
            snowAccumulation.style.height = `${accumulationHeight}px`;
        }

        function createSnowflake() {
            const snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');

            // Randomly pick between ❄ and •
            const isDot = Math.random() > 0.7;
            snowflake.textContent = isDot ? '⚪' : '❄';

            // Random horizontal position
            snowflake.style.left = Math.random() * 100 + 'vw';

            // Random fall speed (5–10 seconds)
            const duration = Math.random() * 5 + 5;
            snowflake.style.animationDuration = duration + 's';

            snowflake.style.fontSize = isDot ?
                (Math.random() * 10 + 6) + 'px' // ⚪ = 12–32px
                :
                (Math.random() * 16 + 10) + 'px'; // ❄ = 10–26px

            // Random opacity
            snowflake.style.opacity = Math.random() * 0.5 + 0.3;

            snowContainer.appendChild(snowflake);

            // Handle snow accumulation
            const fallDuration = duration * 1000;
            setTimeout(() => {
                if (accumulationHeight < maxAccumulation) {
                    accumulationHeight += accumulationRate;
                    updateSnowPile();
                }
            }, fallDuration * 0.9);

            // Remove snowflake after it falls
            setTimeout(() => snowflake.remove(), fallDuration + 1000);
        }

        setInterval(createSnowflake, 120);
    </script>

    <!-- Login Form -->
    <div class="glass rounded-3xl shadow-2xl p-8 w-full max-w-md relative overflow-hidden" id="loginForm">
        <!-- Snow buildup on form edges -->
        <div class="form-snow form-snow-top" id="snowTop"></div>
        <div class="form-snow form-snow-left" id="snowLeft"></div>
        <div class="form-snow form-snow-right" id="snowRight"></div>
        <div class="form-snow form-snow-corner form-snow-corner-tl" id="snowCornerTL"></div>
        <div class="form-snow form-snow-corner form-snow-corner-tr" id="snowCornerTR"></div>
        <div class="form-snow form-snow-corner form-snow-corner-bl" id="snowCornerBL"></div>
        <div class="form-snow form-snow-corner form-snow-corner-br" id="snowCornerBR"></div>

        <!-- Background pattern -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-red-500/10 rounded-full"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-green-500/10 rounded-full"></div>

        <!-- Decorative elements -->
        <div class="absolute -left-12 -bottom-8 text-5xl text-red-500/30 floating">🎄</div>
        <div class="absolute -right-12 -top-8 text-5xl text-green-500/30 floating" style="animation-delay: 2.5s">🎁</div>

        <div class="text-center mb-8 relative z-10">
            <h1 class="authify-logo text-5xl font-bold text-white mb-2">auth<span class="text-red-300">i</span>fy</h1>
            <p class="text-white/80 text-sm mt-2">
                Secure Single Sign-On with holiday cheer
            </p>
        </div>

        <form method="POST" action="{{ url('/api/login') }}" class="space-y-5 relative z-10">
            <input type="hidden" name="redirect" value="{{ $redirect }}">

            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-xl">🎅</span>
                    </div>
                    <input type="text" name="employeeID" id="employeeID"
                        class="input-focus w-full pl-12 pr-4 py-3 bg-white/90 border border-gray-300 rounded-xl text-gray-800 text-xl focus:outline-none focus:ring-2 focus:ring-red-500/50 transition-all duration-300"
                        value="" required placeholder="Employee ID">
                </div>
            </div>

            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-xl">🎁</span>
                    </div>
                    <input type="password" name="password" id="password"
                        class="input-focus w-full pl-12 pr-4 py-3 bg-white/90 border border-gray-300 rounded-xl text-gray-800 text-xl focus:outline-none focus:ring-2 focus:ring-red-500/50 transition-all duration-300"
                        required placeholder="Password">
                </div>
            </div>

            <button type="submit"
                class="btn-hover w-full text-white py-3.5 text-lg rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-snowflake animate-bounce text-green-300"></i>
                Login
            </button>

        </form>
    </div>

    <!-- Background Christmas Music -->
    <audio id="bgMusic" autoplay loop muted>
        <source src="https://assets.mixkit.co/music/preview/mixkit-christmas-magic-914.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Modern unmute button -->
    <button id="unmuteBtn"
        class="fixed bottom-6 right-6 bg-white/20 backdrop-blur-md text-white px-4 py-3 rounded-full shadow-lg hover:bg-white/30 transition-all duration-300 z-50 flex items-center gap-2 border border-white/30">
        <i class="fas fa-volume-mute"></i>
        <span>Tap to Unmute</span>
    </button>

    <script>
        // Initialize particles.js
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof particlesJS !== 'undefined') {
                particlesJS('particles-js', {
                    particles: {
                        number: {
                            value: 30,
                            density: {
                                enable: true,
                                value_area: 800
                            }
                        },
                        color: {
                            value: "#ffffff"
                        },
                        shape: {
                            type: "circle"
                        },
                        opacity: {
                            value: 0.3,
                            random: true
                        },
                        size: {
                            value: 3,
                            random: true
                        },
                        move: {
                            enable: true,
                            speed: 1,
                            direction: "none",
                            random: true
                        }
                    }
                });
            }
        });

        const music = document.getElementById('bgMusic');
        const btn = document.getElementById('unmuteBtn');

        // Set audio properties
        music.volume = 0.7;
        music.playbackRate = 1.0;

        // Unmute and play once user interacts
        const enableSound = () => {
            music.muted = false;
            music.play().catch(err => console.log('Audio play error:', err));
            btn.innerHTML = '<i class="fas fa-volume-up"></i><span>Music On</span>';
            setTimeout(() => {
                btn.style.opacity = '0';
                setTimeout(() => btn.style.display = 'none', 500);
            }, 2000);
        };

        document.addEventListener('click', enableSound, {
            once: true
        });
        btn.addEventListener('click', enableSound, {
            once: true
        });

        // Gradually build up snow on form edges
        let snowBuildUp = 0;
        const maxSnowBuildUp = 1;

        function buildFormSnow() {
            if (snowBuildUp < maxSnowBuildUp) {
                snowBuildUp += 0.01;

                // Gradually increase snow thickness
                document.getElementById('snowTop').style.height = `${8 + snowBuildUp * 12}px`;
                document.getElementById('snowLeft').style.width = `${8 + snowBuildUp * 12}px`;
                document.getElementById('snowRight').style.width = `${8 + snowBuildUp * 12}px`;

                // Increase corner snow size
                const cornerSize = 15 + snowBuildUp * 20;
                const corners = document.querySelectorAll('.form-snow-corner');
                corners.forEach(corner => {
                    corner.style.width = `${cornerSize}px`;
                    corner.style.height = `${cornerSize}px`;
                });

                // Adjust corner positions
                const offset = 6 + snowBuildUp * 8;
                document.getElementById('snowCornerTL').style.top = `-${offset}px`;
                document.getElementById('snowCornerTL').style.left = `-${offset}px`;
                document.getElementById('snowCornerTR').style.top = `-${offset}px`;
                document.getElementById('snowCornerTR').style.right = `-${offset}px`;
                document.getElementById('snowCornerBL').style.bottom = `-${offset}px`;
                document.getElementById('snowCornerBL').style.left = `-${offset}px`;
                document.getElementById('snowCornerBR').style.bottom = `-${offset}px`;
                document.getElementById('snowCornerBR').style.right = `-${offset}px`;

                // Continue building until max
                setTimeout(buildFormSnow, 200);
            }
        }

        // Start building snow on form after a delay
        setTimeout(buildFormSnow, 3000);
    </script>

</body>

</html>
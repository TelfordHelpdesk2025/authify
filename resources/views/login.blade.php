<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SSO Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Mountains+of+Christmas:wght@700&display=swap');

        /* ---------- Default Theme ---------- */
        body.default-theme {
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            color: #000;
        }

        /* ---------- Christmas Theme ---------- */
        body.christmas-theme {
            font-family: 'Mountains of Christmas', cursive;
            background: linear-gradient(135deg, #0b3d2e 0%, #14532d 50%, #0f766e 100%);
            overflow-x: hidden;
            position: relative;
            cursor: grab;
        }

        .authify-logo {
            text-shadow: 0 4px 15px rgba(185, 28, 28, 0.4);
        }

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

            100% {
                transform: translateY(100vh) translateX(20px) rotate(360deg);
                opacity: 0;
            }
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
            z-index: 10;
        }

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

        .btn-hover {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #3ad13a 0%, #b91c1c 100%);
            box-shadow: 0 4px 15px 0 rgba(220, 38, 38, 0.4);
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px 0 rgba(220, 38, 38, 0.5);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
            border-color: #dc2626;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
</head>

<body class="transition-all duration-700">

    <!-- ========== Default Login Layout ========== -->
    <div id="defaultLayout" class="hidden flex items-center justify-center h-screen">
        <form method="POST" action="{{ route('login') }}" class="w-[450px]">
            <input type="hidden" name="redirect" value="{{ $redirect }}">

            <p class="text-[70pt] font-bold mb-0 text-center"><span class="text-blue-600">auth</span>ify</p>
            <p class="text-[12pt] font-normal mb-6 mt-0 text-center">
                A seamless Single Sign-On experience across multiple applications.
            </p>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1" for="employeeID">Employee ID</label>
                <input type="text" name="employeeID" id="employeeID"
                    class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium mb-1" for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border rounded" required>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                Login
            </button>
        </form>
    </div>

    <!-- ========== Christmas Login Layout ========== -->
    <div id="christmasLayout" class="hidden flex items-center justify-center min-h-screen px-4 relative text-white text-center">

        <div id="particles-js"></div>

        <div class="glass rounded-3xl shadow-2xl p-8 w-full max-w-md relative overflow-hidden">
            <div class="absolute -left-12 -bottom-8 text-5xl text-red-500/30 floating">🎄</div>
            <div class="absolute -right-12 -top-8 text-5xl text-green-500/30 floating" style="animation-delay: 2.5s">🎁</div>

            <div class="text-center mb-8 relative z-10">
                <h1 class="authify-logo text-5xl font-bold text-white mb-2">auth<span class="text-red-300">i</span>fy</h1>
                <p class="text-white/80 text-sm mt-2">Secure Single Sign-On with holiday cheer</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5 relative z-10">
                <input type="hidden" name="redirect" value="{{ $redirect }}">

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-xl">🎅</span>
                    </div>
                    <input type="text" name="employeeID" id="employeeID"
                        class="input-focus w-full pl-12 pr-4 py-3 bg-white/90 border border-gray-300 rounded-xl text-gray-800 text-xl"
                        required placeholder="Employee ID">
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-xl">🎁</span>
                    </div>
                    <input type="password" name="password" id="password"
                        class="input-focus w-full pl-12 pr-4 py-3 bg-white/90 border border-gray-300 rounded-xl text-gray-800 text-xl"
                        required placeholder="Password">
                </div>

                <button type="submit"
                    class="btn-hover w-full text-white py-3.5 text-lg rounded-xl font-semibold flex items-center justify-center gap-2">
                    <i class="fas fa-snowflake animate-bounce text-green-300"></i> Login
                </button>
            </form>
        </div>

        <!-- Music -->
        <audio id="bgMusic" autoplay loop muted>
            <source src="https://assets.mixkit.co/music/preview/mixkit-christmas-magic-914.mp3" type="audio/mpeg">
        </audio>

        <button id="unmuteBtn"
            class="fixed bottom-6 right-6 bg-white/20 backdrop-blur-md text-white px-4 py-3 rounded-full shadow-lg hover:bg-white/30 transition-all duration-300 z-50 flex items-center gap-2 border border-white/30">
            <i class="fas fa-volume-mute"></i>
            <span>Tap to Unmute</span>
        </button>
    </div>

    <script>
        // === Date condition: show Christmas layout Nov 3 - Jan 1 ===
        const now = new Date();
        const year = now.getFullYear();
        const start = new Date(`${year}-11-03T00:00:00`);
        const end = new Date(`${year + 1}-01-01T23:59:59`);

        const body = document.body;
        const christmas = document.getElementById("christmasLayout");
        const normal = document.getElementById("defaultLayout");

        if (now >= start || now <= end) {
            // Show Christmas theme
            body.classList.add("christmas-theme");
            christmas.classList.remove("hidden");

            // Particles and snow
            if (typeof particlesJS !== "undefined") {
                particlesJS("particles-js", {
                    particles: {
                        number: {
                            value: 35
                        },
                        color: {
                            value: "#ffffff"
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
                            speed: 1
                        }
                    }
                });
            }

            setInterval(() => {
                const snowflake = document.createElement("div");
                snowflake.classList.add("snowflake");
                snowflake.textContent = Math.random() > 0.5 ? "❄" : "•";
                snowflake.style.left = Math.random() * 100 + "vw";
                snowflake.style.animationDuration = (Math.random() * 5 + 5) + "s";
                snowflake.style.fontSize = (Math.random() * 16 + 10) + "px";
                document.body.appendChild(snowflake);
                setTimeout(() => snowflake.remove(), 10000);
            }, 150);

            // Music control
            const music = document.getElementById("bgMusic");
            const btn = document.getElementById("unmuteBtn");
            const enableSound = () => {
                music.muted = false;
                music.play().catch(() => {});
                btn.innerHTML = '<i class="fas fa-volume-up"></i><span>Music On</span>';
                setTimeout(() => btn.remove(), 2000);
            };
            document.addEventListener("click", enableSound, {
                once: true
            });
            btn.addEventListener("click", enableSound, {
                once: true
            });

        } else {
            // Show normal layout
            body.classList.add("default-theme");
            normal.classList.remove("hidden");
        }
    </script>

</body>

</html>
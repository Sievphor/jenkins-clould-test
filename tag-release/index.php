<?php
    $developer = "Tonn Sievphor";
    $server_time = date('Y-m-d H:i:s T');
    $php_version = phpversion();
    $release_version = getenv('APP_VERSION') ?: "v1.0.0";
    $server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Tag Release CI/CD - AWS EC2</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts Khmer -->
    <link href="https://fonts.googleapis.com/css2?family=Kantumruuy+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kantumruuy Pro', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-white min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-slate-900 border border-slate-800 rounded-3xl shadow-2xl p-8 md:p-10 space-y-8">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/30 text-purple-300 text-sm font-semibold">
                <i class="fa-solid fa-tag text-purple-400"></i>
                <span>Release Version: <?php echo htmlspecialchars($release_version); ?> (Port 9097)</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r from-purple-400 via-pink-300 to-indigo-400 bg-clip-text text-transparent">
                🏷️ Git Tag-Based Production Release
            </h1>
            <p class="text-slate-400 text-base">
                គម្រោងស្វ័យប្រវត្តិកម្ម CI/CD ដែលដំណើរការ Build & Deploy តែពេលមាន <span class="text-purple-300 font-mono">Git Tag (v1.0.0)</span>
            </p>
        </div>

        <!-- Workflow Badges -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="bg-slate-800/60 border border-slate-700/60 rounded-2xl p-4 space-y-1">
                <i class="fa-solid fa-code-commit text-2xl text-purple-400"></i>
                <div class="font-semibold text-xs">1. Git Tag</div>
                <div class="text-[11px] text-slate-400">git tag v1.0.0</div>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/60 rounded-2xl p-4 space-y-1">
                <i class="fa-brands fa-jenkins text-2xl text-red-400"></i>
                <div class="font-semibold text-xs">2. Jenkins</div>
                <div class="text-[11px] text-slate-400">refs/tags/* Trigger</div>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/60 rounded-2xl p-4 space-y-1">
                <i class="fa-brands fa-docker text-2xl text-blue-400"></i>
                <div class="font-semibold text-xs">3. Docker Hub</div>
                <div class="text-[11px] text-slate-400">Image:v1.0.0</div>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/60 rounded-2xl p-4 space-y-1">
                <i class="fa-brands fa-aws text-2xl text-amber-400"></i>
                <div class="font-semibold text-xs">4. AWS EC2</div>
                <div class="text-[11px] text-slate-400">Live Port 9097</div>
            </div>
        </div>

        <!-- System Details Info Box -->
        <div class="bg-slate-950/80 border border-slate-800/80 rounded-2xl p-6 space-y-4">
            <h2 class="text-base font-semibold text-purple-400 flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                ព័ត៌មានលម្អិតនៃ Tag Version
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Developer:</span>
                    <span class="font-semibold text-slate-200"><?php echo htmlspecialchars($developer); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Release Tag:</span>
                    <span class="font-mono text-purple-400 font-bold"><?php echo htmlspecialchars($release_version); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Server Host IP:</span>
                    <span class="font-mono text-amber-400">52.63.116.240</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Production Port:</span>
                    <span class="font-mono text-emerald-400 font-bold">9097</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800 sm:col-span-2">
                    <span class="text-slate-400">Docker Image Tagged:</span>
                    <span class="font-mono text-indigo-300">phor2026/usea-app-tag:<?php echo htmlspecialchars($release_version); ?></span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center pt-2">
            <p class="text-xs text-slate-500">
                🎉 Tag-based CI/CD deployment running smoothly on AWS EC2!
            </p>
        </div>

    </div>
</body>
</html>

<?php
    $developer = "Tonn Sievphor";
    $server_time = date('Y-m-d H:i:s T');
    $php_version = phpversion();
    $release_version = getenv('APP_VERSION') ?: "v2.0.0";
    $server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $memory_usage = round(memory_get_usage() / 1024, 2) . ' KB';
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tag Release v2.0.0 - AWS EC2</title>
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
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-purple-950 text-white min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-slate-900/90 backdrop-blur-md border border-purple-500/30 rounded-3xl shadow-2xl p-8 md:p-10 space-y-8">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/40 text-purple-300 text-sm font-semibold shadow-inner">
                <i class="fa-solid fa-tag text-purple-400"></i>
                <span>Release Version: <?php echo htmlspecialchars($release_version); ?> (Port 9097)</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-purple-400 via-pink-300 to-indigo-400 bg-clip-text text-transparent">
                🏷️ PHP Tag-Based Release v2.0
            </h1>
            <p class="text-slate-300 text-base">
                🚀 ការអាប់ដេតកំណែថ្មី <strong>v2.0.0</strong> ដំណើរការ Production Release ដោយស្វ័យប្រវត្តិតាមរយៈ <span class="text-purple-300 font-mono font-bold">Git Tag (<?php echo htmlspecialchars($release_version); ?>)</span>
            </p>
        </div>

        <!-- Release Highlights -->
        <div class="bg-purple-950/40 border border-purple-800/50 rounded-2xl p-4 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-500/20 border border-purple-500/40 flex items-center justify-center text-purple-400 text-2xl flex-shrink-0">
                <i class="fa-solid fa-rocket"></i>
            </div>
            <div>
                <h3 class="font-bold text-purple-300 text-sm md:text-base">✨ Version 2.0.0 Production Release:</h3>
                <p class="text-xs md:text-sm text-slate-300">
                    Production Tag Release triggered on Git Tag push, automatic image tagging (<code class="text-purple-400">phor2026/usea-app-tag:<?php echo htmlspecialchars($release_version); ?></code>), and zero-downtime container swap.
                </p>
            </div>
        </div>

        <!-- Workflow Badges -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-purple-500/50 transition">
                <i class="fa-solid fa-code-commit text-3xl text-purple-400"></i>
                <div class="font-semibold text-xs text-slate-200">1. Git Tag</div>
                <div class="text-[11px] text-purple-300 font-mono"><?php echo htmlspecialchars($release_version); ?></div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-purple-500/50 transition">
                <i class="fa-brands fa-jenkins text-3xl text-red-400"></i>
                <div class="font-semibold text-xs text-slate-200">2. Jenkins</div>
                <div class="text-[11px] text-slate-400">tag-php-pipeline</div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-purple-500/50 transition">
                <i class="fa-brands fa-docker text-3xl text-blue-400"></i>
                <div class="font-semibold text-xs text-slate-200">3. Docker Hub</div>
                <div class="text-[11px] text-slate-400">Image:<?php echo htmlspecialchars($release_version); ?></div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-purple-500/50 transition">
                <i class="fa-brands fa-aws text-3xl text-amber-400"></i>
                <div class="font-semibold text-xs text-slate-200">4. AWS EC2</div>
                <div class="text-[11px] text-emerald-400 font-mono">Port 9097</div>
            </div>
        </div>

        <!-- System Details Info Box -->
        <div class="bg-slate-950/80 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-base font-semibold text-purple-400 flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                ព័ត៌មានលម្អិតនៃ Tag Version (v2.0.0)
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Developer:</span>
                    <span class="font-semibold text-slate-100"><?php echo htmlspecialchars($developer); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Active Release Tag:</span>
                    <span class="font-mono text-purple-400 font-bold"><?php echo htmlspecialchars($release_version); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">PHP Engine:</span>
                    <span class="font-mono text-indigo-400">PHP <?php echo $php_version; ?> Alpine</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Memory Footprint:</span>
                    <span class="font-mono text-cyan-400"><?php echo $memory_usage; ?></span>
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
                    <span class="text-slate-400">Server Timestamp:</span>
                    <span class="font-mono text-emerald-300 text-xs"><?php echo $server_time; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800 sm:col-span-2">
                    <span class="text-slate-400">Docker Image Tagged:</span>
                    <span class="font-mono text-indigo-300">phor2026/usea-app-tag:<?php echo htmlspecialchars($release_version); ?></span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center pt-2">
            <p class="text-xs text-slate-400">
                🎉 Tag-based CI/CD deployment <strong>Version 2.0.0</strong> running smoothly on AWS EC2!
            </p>
        </div>

    </div>
</body>
</html>

<?php
    $developer = "Tonn Sievphor";
    $server_time = date('Y-m-d H:i:s T');
    $php_version = phpversion();
    $app_version = "v2.0.0";
    $server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $memory_usage = round(memory_get_usage() / 1024, 2) . ' KB';
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dynamic Web v2.0.0 - AWS EC2</title>
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
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 text-white min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-slate-900/90 backdrop-blur-md border border-indigo-500/30 rounded-3xl shadow-2xl p-8 md:p-10 space-y-8">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/40 text-indigo-300 text-sm font-semibold shadow-inner">
                <i class="fa-brands fa-php text-lg text-indigo-400"></i>
                <span>PHP Version: <?php echo $php_version; ?> | App: <?php echo $app_version; ?> (Port 9099)</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-400 bg-clip-text text-transparent">
                🐘 PHP Dynamic Web App v2.0
            </h1>
            <p class="text-slate-300 text-base">
                🚀 ការអាប់ដេតកំណែថ្មី <strong>v2.0.0</strong> ដំណើរការស្វ័យប្រវត្តិតាមរយៈ <span class="text-indigo-300 font-semibold">Jenkins Webhook CI/CD</span> & PHP 8.2 Alpine
            </p>
        </div>

        <!-- Release Highlights -->
        <div class="bg-indigo-950/40 border border-indigo-800/50 rounded-2xl p-4 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-500/20 border border-indigo-500/40 flex items-center justify-center text-indigo-400 text-2xl flex-shrink-0">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div>
                <h3 class="font-bold text-indigo-300 text-sm md:text-base">✨ Version 2.0.0 Dynamic Features:</h3>
                <p class="text-xs md:text-sm text-slate-300">
                    Upgraded to PHP 8.2 Alpine lightweight container, real-time memory monitoring, automated webhook triggers, and live deployment metrics.
                </p>
            </div>
        </div>

        <!-- Workflow Badges -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-indigo-500/50 transition">
                <i class="fa-brands fa-php text-3xl text-purple-400"></i>
                <div class="font-semibold text-xs text-slate-200">PHP 8.2 Alpine</div>
                <div class="text-[11px] text-indigo-400 font-mono">v2.0.0</div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-indigo-500/50 transition">
                <i class="fa-brands fa-jenkins text-3xl text-red-400"></i>
                <div class="font-semibold text-xs text-slate-200">Jenkins CI/CD</div>
                <div class="text-[11px] text-slate-400">php-pipeline</div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-indigo-500/50 transition">
                <i class="fa-brands fa-docker text-3xl text-blue-400"></i>
                <div class="font-semibold text-xs text-slate-200">Docker Hub</div>
                <div class="text-[11px] text-slate-400">usea-app-php:latest</div>
            </div>
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 space-y-1 hover:border-indigo-500/50 transition">
                <i class="fa-brands fa-aws text-3xl text-amber-400"></i>
                <div class="font-semibold text-xs text-slate-200">AWS EC2</div>
                <div class="text-[11px] text-emerald-400 font-mono">Port 9099</div>
            </div>
        </div>

        <!-- Dynamic PHP Info Box -->
        <div class="bg-slate-950/80 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-base font-semibold text-indigo-400 flex items-center gap-2">
                <i class="fa-solid fa-code"></i>
                ព័ត៌មាន Dynamic ចេញពី PHP Server (v2.0.0)
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Developer:</span>
                    <span class="font-semibold text-slate-100"><?php echo htmlspecialchars($developer); ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">App Version:</span>
                    <span class="font-mono text-purple-400 font-bold"><?php echo $app_version; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">PHP Engine:</span>
                    <span class="font-mono text-indigo-400">PHP <?php echo $php_version; ?> Alpine</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Memory Usage:</span>
                    <span class="font-mono text-cyan-400"><?php echo $memory_usage; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Server Host IP:</span>
                    <span class="font-mono text-amber-400">52.63.116.240</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800">
                    <span class="text-slate-400">Application Port:</span>
                    <span class="font-mono text-emerald-400 font-bold">9099</span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800 sm:col-span-2">
                    <span class="text-slate-400">Server Timestamp:</span>
                    <span class="font-mono text-emerald-300 text-xs"><?php echo $server_time; ?></span>
                </div>
                <div class="flex justify-between py-2 border-b border-slate-800 sm:col-span-2">
                    <span class="text-slate-400">Docker Hub Repo:</span>
                    <span class="font-mono text-indigo-300">phor2026/usea-app-php:latest</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center pt-2">
            <p class="text-xs text-slate-400">
                🎉 PHP Web Application <strong>Version 2.0.0</strong> deployed successfully via Jenkins CI/CD!
            </p>
        </div>

    </div>
</body>
</html>

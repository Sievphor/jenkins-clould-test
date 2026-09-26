<?php
    $developer = "Tonn Sievphor";
    $server_time = date('Y-m-d H:i:s T');
    $php_version = phpversion();
    $server_ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CI/CD Deployment - AWS EC2</title>
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
<body class="bg-slate-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-slate-800 border border-slate-700 rounded-2xl shadow-2xl p-8 md:p-10 space-y-8">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 text-sm font-medium">
                <i class="fa-brands fa-php text-lg"></i>
                <span>PHP Version: <?php echo $php_version; ?></span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-400 via-indigo-300 to-purple-400 bg-clip-text text-transparent">
                🐘 PHP Application on AWS EC2
            </h1>
            <p class="text-slate-400 text-base">
                គម្រោង PHP Web Application ដំណើរការស្វ័យប្រវត្តិកម្ម CI/CD ជាមួយ Jenkins & Docker
            </p>
        </div>

        <!-- Workflow Badges -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="bg-slate-700/40 border border-slate-600/60 rounded-xl p-4 space-y-1">
                <i class="fa-brands fa-github text-2xl text-purple-400"></i>
                <div class="font-semibold text-xs">GitHub</div>
                <div class="text-[11px] text-slate-400">Webhook</div>
            </div>
            <div class="bg-slate-700/40 border border-slate-600/60 rounded-xl p-4 space-y-1">
                <i class="fa-brands fa-jenkins text-2xl text-red-400"></i>
                <div class="font-semibold text-xs">Jenkins</div>
                <div class="text-[11px] text-slate-400">PHP Test & Build</div>
            </div>
            <div class="bg-slate-700/40 border border-slate-600/60 rounded-xl p-4 space-y-1">
                <i class="fa-brands fa-docker text-2xl text-blue-400"></i>
                <div class="font-semibold text-xs">Docker Hub</div>
                <div class="text-[11px] text-slate-400">Registry</div>
            </div>
            <div class="bg-slate-700/40 border border-slate-600/60 rounded-xl p-4 space-y-1">
                <i class="fa-brands fa-aws text-2xl text-amber-400"></i>
                <div class="font-semibold text-xs">AWS EC2</div>
                <div class="text-[11px] text-slate-400">Auto Deploy</div>
            </div>
        </div>

        <!-- Dynamic PHP Info Box -->
        <div class="bg-slate-950/60 border border-slate-800 rounded-xl p-6 space-y-4">
            <h2 class="text-base font-semibold text-indigo-400 flex items-center gap-2">
                <i class="fa-solid fa-code"></i>
                ព័ត៌មាន Dynamic ចេញពី PHP Server
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div class="flex justify-between py-1.5 border-b border-slate-800">
                    <span class="text-slate-400">Developer:</span>
                    <span class="font-semibold text-slate-200"><?php echo htmlspecialchars($developer); ?></span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-800">
                    <span class="text-slate-400">PHP Engine:</span>
                    <span class="font-mono text-purple-400">PHP <?php echo $php_version; ?> + Apache</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-800">
                    <span class="text-slate-400">Server Time:</span>
                    <span class="font-mono text-emerald-400 text-xs"><?php echo $server_time; ?></span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-800">
                    <span class="text-slate-400">Server Host IP:</span>
                    <span class="font-mono text-amber-400">3.107.9.73</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-800 sm:col-span-2">
                    <span class="text-slate-400">Visitor IP:</span>
                    <span class="font-mono text-blue-300"><?php echo htmlspecialchars($client_ip); ?></span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center pt-2">
            <p class="text-xs text-slate-500">
                🚀 PHP Web App Version deployed successfully via Jenkins CI/CD!
            </p>
        </div>

    </div>
</body>
</html>

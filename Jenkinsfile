pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                echo '📥 Pulling latest code from GitHub...'
            }
        }

        stage('Build') {
            steps {
                echo '🔨 Building Application...'
                echo '✅ Build completed!'
            }
        }

        stage('Test') {
            steps {
                echo '🧪 Running Tests...'
                echo '✅ All tests passed!'
            }
        }

        stage('Deploy') {
            steps {
                echo '🚀 Deploying Application...'
                echo '🎉 Application deployed successfully!'
            }
        }
    }

    post {
        always {
            echo '📢 Finished executing pipeline.'
        }
        success {
            echo '🟢 Pipeline Succeeded!'
        }
        failure {
            echo '🔴 Pipeline Failed!'
        }
    }
}

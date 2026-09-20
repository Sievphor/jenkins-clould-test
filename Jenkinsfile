pipeline {
    agent any

    environment {
        IMAGE_NAME = 'jenkins-demo-app'
        APP_PORT   = '8081'
    }

    stages {
        stage('1. Checkout Code') {
            steps {
                echo "📥 Pulling latest code from GitHub..."
                checkout scm
            }
        }

        stage('2. Build Docker Image') {
            steps {
                echo "🔨 Building Docker Image: ${IMAGE_NAME}:latest..."
                sh "docker build -t ${IMAGE_NAME}:latest -t ${IMAGE_NAME}:${BUILD_NUMBER} ."
            }
        }

        stage('3. Test Container') {
            steps {
                echo "🧪 Testing Nginx Configuration..."
                sh "docker run --rm --entrypoint nginx ${IMAGE_NAME}:latest -t"
                echo "✅ All tests passed successfully!"
            }
        }

        stage('4. Auto Deploy') {
            steps {
                echo "🚀 Deploying Application to Container on Port ${APP_PORT}..."
                sh """
                    docker rm -f ${IMAGE_NAME} || true
                    docker run -d --name ${IMAGE_NAME} -p ${APP_PORT}:80 ${IMAGE_NAME}:latest
                """
                echo "🎉 Application deployed and running at http://localhost:${APP_PORT}"
            }
        }
    }

    post {
        success {
            echo "🟢 ====================================="
            echo "🟢 CI/CD PIPELINE SUCCEEDED 100%!"
            echo "🟢 Access app at: http://localhost:8081"
            echo "🟢 ====================================="
        }
        failure {
            echo "🔴 Pipeline failed. Please check logs."
        }
    }
}

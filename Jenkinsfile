pipeline {
    agent any

    environment {
        DOCKER_HUB_USER = 'phor2026'
        IMAGE_NAME      = 'jenkins-demo-app'
        APP_PORT        = '8081'
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
                echo "🔨 Building Docker Image: ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest..."
                sh "docker build -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:${BUILD_NUMBER} ."
            }
        }

        stage('3. Test Container') {
            steps {
                echo "🧪 Testing Nginx Configuration..."
                sh "docker run --rm --entrypoint nginx ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest -t"
                echo "✅ All tests passed successfully!"
            }
        }

        stage('4. Auto Deploy Local') {
            steps {
                echo "🚀 Deploying Application to Container on Port ${APP_PORT}..."
                sh """
                    docker rm -f ${IMAGE_NAME} || true
                    docker run -d --name ${IMAGE_NAME} -p ${APP_PORT}:80 ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest
                """
                echo "🎉 Application deployed and running at http://localhost:${APP_PORT}"
            }
        }

        stage('5. Push to Docker Hub') {
            steps {
                echo "🚀 Logging in and Pushing Image to Docker Hub..."
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', usernameVariable: 'DH_USER', passwordVariable: 'DH_PASS')]) {
                    sh 'echo "$DH_PASS" | docker login -u "$DH_USER" --password-stdin'
                    sh "docker push ${DOCKER_HUB_USER}/${IMAGE_NAME}:${BUILD_NUMBER}"
                    sh "docker push ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest"
                }
                echo "🎉 Image pushed to Docker Hub successfully!"
            }
        }
    }

    post {
        always {
            sh "docker logout || true"
        }
        success {
            echo "🟢 ==================================================="
            echo "🟢 CI/CD PIPELINE & DOCKER HUB PUSH SUCCEEDED 100%!"
            echo "🟢 Web App Running at: http://localhost:8081"
            echo "🟢 Docker Hub: https://hub.docker.com/r/${DOCKER_HUB_USER}/${IMAGE_NAME}"
            echo "🟢 ==================================================="
        }
        failure {
            echo "🔴 Pipeline failed. Please check logs."
        }
    }
}

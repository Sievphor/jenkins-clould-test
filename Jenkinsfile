pipeline {
    agent any

    environment {
        // ប្តូរ phor2026 ទៅជាឈ្មោះ Docker Hub របស់អ្នក
        DOCKER_HUB_USER = 'phor2026'
        IMAGE_NAME      = 'jenkins-demo-app'
        IMAGE_TAG       = "${BUILD_NUMBER}"
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
                echo "🔨 Building Docker Image: ${DOCKER_HUB_USER}/${IMAGE_NAME}:${IMAGE_TAG}"
                sh "docker build -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:${IMAGE_TAG} -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest ."
            }
        }

        stage('3. Test Container') {
            steps {
                echo "🧪 Testing Docker Image..."
                sh "docker run --rm ${DOCKER_HUB_USER}/${IMAGE_NAME}:${IMAGE_TAG} nginx -t"
                echo "✅ Tests passed!"
            }
        }

        stage('4. Push to Docker Hub') {
            steps {
                // ប្រើ Credential ID: 'docker-hub-credentials' ដែលបង្កើតក្នុង Jenkins
                withCredentials([usernamePassword(credentialsId: 'docker-hub-credentials', usernameVariable: 'DH_USER', passwordVariable: 'DH_PASS')]) {
                    sh 'echo "$DH_PASS" | docker login -u "$DH_USER" --password-stdin'
                    sh "docker push ${DOCKER_HUB_USER}/${IMAGE_NAME}:${IMAGE_TAG}"
                    sh "docker push ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest"
                }
                echo "🚀 Image pushed to Docker Hub successfully!"
            }
        }
    }

    post {
        always {
            echo "🧹 Cleaning up local images..."
            sh "docker logout"
        }
        success {
            echo "🟢 CI/CD Pipeline Succeeded!"
        }
        failure {
            echo "🔴 CI/CD Pipeline Failed!"
        }
    }
}

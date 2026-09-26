pipeline {
    agent any

    environment {
        DOCKER_HUB_USER = 'phor2026'
        IMAGE_NAME      = 'jenkins-demo-app'
        EC2_IP          = '3.107.9.73'
        EC2_USER        = 'ubuntu'        // ឬ root ឬ ec2-user តាម OS របស់ EC2
        APP_PORT        = '9099'
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
                echo "🔨 Building Docker Image: ${DOCKER_HUB_USER}/${IMAGE_NAME}:${BUILD_NUMBER}..."
                sh "docker build -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest -t ${DOCKER_HUB_USER}/${IMAGE_NAME}:${BUILD_NUMBER} ."
            }
        }

        stage('3. Push to Docker Hub') {
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

        stage('4. Deploy to AWS EC2') {
            steps {
                echo "🚢 Connecting via SSH to AWS EC2 (${EC2_IP}) and Deploying..."
                sshagent(['ec2-server-key']) {
                    sh """
                        ssh -o StrictHostKeyChecking=no ${EC2_USER}@${EC2_IP} "
                            docker pull ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest && \\
                            docker stop ${IMAGE_NAME} || true && \\
                            docker rm ${IMAGE_NAME} || true && \\
                            docker run -d --name ${IMAGE_NAME} -p ${APP_PORT}:80 ${DOCKER_HUB_USER}/${IMAGE_NAME}:latest
                        "
                    """
                }
                echo "🎉 Deployed to AWS EC2 successfully! Check at http://${EC2_IP}:${APP_PORT}"
            }
        }
    }

    post {
        always {
            sh "docker logout || true"
        }
        success {
            echo "🟢 ========================================================="
            echo "🟢 CI/CD PIPELINE & DEPLOY TO AWS EC2 SUCCEEDED 100%!"
            echo "🟢 Web App Running on AWS: http://3.107.9.73:9099"
            echo "🟢 Docker Hub: https://hub.docker.com/r/phor2026/jenkins-demo-app"
            echo "🟢 ========================================================="
        }
        failure {
            echo "🔴 Pipeline failed. Please check logs."
        }
    }
}

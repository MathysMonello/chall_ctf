terraform {
  required_providers {
    docker = {
      source  = "kreuzwerker/docker"
    }
  }
}

provider "docker" {
  host = "ssh://${var.dockeruser}@${var.dockerhost}:${var.dockerport}"
}

# Network configuration (if needed)
resource "docker_network" "my_network" {
  name = "my_network"
}

# Game App Service
resource "docker_image" "fan-asteroid-game" {
  name = "fan-asteroid-game:latest"
}

resource "docker_container" "fan-asteroid-game" {
  name  = "fan-asteroid-game"
  image = "${var.docker_registry}/fan-asteroid-game:${var.build_version}"
  ports {
    internal = 80
    external = 8081
  }
  networks_advanced {
    name = docker_network.my_network.name
  }
}

# API Service
resource "docker_image" "fan-asteroid-api" {
  name = "fan-asteroid-api:latest"
}

resource "docker_container" "fan-asteroid-api" {
  name  = "fan-asteroid-api"
  image = "${var.docker_registry}/fan-asteroid-api:${var.build_version}"
  ports {
    internal = 3000
    external = 3000
  }
  networks_advanced {
    name = docker_network.my_network.name
  }
}

# Forum App Service
resource "docker_image" "fan-asteroid-forum" {
  name = "fan-asteroid-forum:latest"
}

resource "docker_container" "fan-asteroid-forum" {
  name  = "fan-asteroid-forum"
  image = "${var.docker_registry}/fan-asteroid-forum:${var.build_version}"
  ports {
    internal = 80
    external = 8080
  }
  networks_advanced {
    name = docker_network.my_network.name
  }
}

variable "instance_id" {
  type = number
}

variable "dockerhost" {
  type = string
}

variable "dockerport" {
  type = string
}

variable "dockeruser" {
  type = string
}

variable "build_version" {
  type = string
}

variable "docker_registry" {
  type = string
}

# Output the external port of the game_app container
output "port" {
  value = docker_container.game_app.ports[0].external
}

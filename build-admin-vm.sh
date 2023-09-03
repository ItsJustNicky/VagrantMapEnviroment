#!/bin/bash

apt-get update
apt-get install openssh-server
apt-get install sshpass

# Generate SSH key pair on source VM (if not already generated)
ssh-keygen -t rsa -b 4096 -f /home/vagrant/.ssh/id_rsa -N ""   
# Source VM (VM doing the SSHing)

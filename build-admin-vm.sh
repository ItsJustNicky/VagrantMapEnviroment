#!/bin/bash

apt-get update
sudo sed -i 's/PasswordAuthentication no/PasswordAuthentication yes/' /etc/ssh/sshd_config
sudo systemctl restart sshd

# Generate SSH key pair on source VM (if not already generated)



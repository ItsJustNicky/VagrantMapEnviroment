#!/bin/bash

apt-get update
apt-get install openssh-server
# Source VM (VM doing the SSHing)
SOURCE_VM_IP="source_vm_ip"

# Destination VM (VM being SSH'd into)
DESTINATION_VM_IP="destination_vm_ip"

# Generate SSH key pair on source VM (if not already generated)
if [ ! -f ~/.ssh/id_rsa ]; then
    ssh-keygen -t rsa -b 4096 -f ~/.ssh/id_rsa -N ""
fi

# Copy public key from source VM to destination VM
sshpass -p "vagrant" ssh-copy-id -o StrictHostKeyChecking=no -i ~/.ssh/id_rsa.pub vagrant@$DESTINATION_VM_IP

# Use SSH keys for authentication from source VM to destination VM
ssh vagrant@$DESTINATION_VM_IP
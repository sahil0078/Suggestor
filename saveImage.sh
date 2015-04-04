#!/bin/bash

sudo /etc/init.d/apache2 stop
sudo /etc/init.d/mysql stop

sudo umount /vol
sudo rm -rf /mnt/image*

sudo ec2-bundle-vol -d /mnt -k ~ubuntu/pk-WN56PVSU4W37O3KY2UURHS5M2N6RT2LT.pem -c ~ubuntu/cert-WN56PVSU4W37O3KY2UURHS5M2N6RT2LT.pem -u 3634-9027-7607 -s 1536

sudo ec2-upload-bundle -b imagebucket0078 -m /mnt/image.manifest.xml -a AKIAIYDKYP3GX3LA424A -s ZvzueFr0ua8JGqEl2TlIBv0tWbKmQtkIQFsV6LbL

 sudo mount -a
 sudo /etc/init.d/apache2 start
 sudo /etc/init.d/mysql start

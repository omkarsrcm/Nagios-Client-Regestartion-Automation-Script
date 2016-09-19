#This script will install the nrpe client on the redhat 7 machine...........
###################################################################################################################
#Enabling the requried repos
#-----------------------------------------------------------------------------------------------------------------
cd /etc/yum.repos.d/
echo "Enabling the repos"
pwd
sed -i 's/enabled=0/enabled=1/g' *.repo
echo "Enabling the repo done..."
####################################################################################################################
#System is installing the requried package to be installed..
#-------------------------------------------------------------------------------------------------------------------
echo "Requried packages are getting installed the system..Please wait.."
yum install -y gcc glibc glibc-common gd gd-devel make net-snmp openssl-devel wget tar
#####################################################################################################################
#Creating a user and password for the Installation Process....
#--------------------------------------------------------------------------------------------------------------------
echo "Enter the details for creating the user and password"

if [ $(id -u) -eq 0 ]; then
	read -p "Enter username : " username
	read -s -p "Enter password : " password
	egrep "^$username" /etc/passwd >/dev/null
	if [ $? -eq 0 ]; then
		echo "$username exists!"
		exit 1
	else
		pass=$(perl -e 'print crypt($ARGV[0], "password")' $password)
		useradd -m -p $pass $username
		[ $? -eq 0 ] && echo "User has been added to system!" || echo "Failed to add a user!"
	fi
else
	echo "Only root may add a user to the system"
	exit 2
fi
######################################################################################################################
#Creating a directory called nagios for future downloads
#--------------------------------------------------------------------------------------------------------------------
cd /
mkdir nagios
cd nagios
pwd
echo "Downloading the Requried npre package....."
wget https://www.nagios-plugins.org/download/nagios-plugins-1.5.tar.gz
#####################################################################################################################
#Extracting the package
#-------------------------------------------------------------------------------------------------------------------
echo "Extracting the downloaded package.........."
tar -xvf /nagios/nagios-plugins-1.5.tar.gz
#####################################################################################################################
#Lisiting the package
#--------------------------------------------------------------------------------------------------------------------
echo "Listing the extracted packages..."
ls /nagios/
#####################################################################################################################
#Compling and installing the nrpe
#-------------------------------------------------------------------------------------------------------------------
echo "Compling and installing the nrpe....."
cd /nagios/nagios-plugins-1.5
./configure
echo "configure completed....."
echo "Making the file.........."
make
echo "Make completed sucessfully..."
echo "Initializing make install............ "
make install
####################################################################################################################
#In this Section we will Set the permissions on the plugin directory.
#-------------------------------------------------------------------------------------------------------------------
echo "Setting put the permissions on the plugin directory..............."
pwd
chown nagios.nagios /usr/local/nagios
echo "Setting permissions on the following /usr/local/nagios directory completed"
chown -R nagios.nagios /usr/local/nagios/libexec
echo "Setting permissions on the following /usr/local/nagios/libexec  directory completed"
#####################################################################################################################
#In this section we will be install Xinetd
#-------------------------------------------------------------------------------------------------------------------
echo "Installing the Xinetd"
yum install -y xinetd
#####################################################################################################################
#Install NRPE Plugin
#-------------------------------------------------------------------------------------------------------------------
echo "Installing the  NRPE Plugin......"
cd /nagios
pwd
echo "Downloading the package.........."
wget http://liquidtelecom.dl.sourceforge.net/project/nagios/nrpe-2.x/nrpe-2.15/nrpe-2.15.tar.gz
echo "Downloading the package complete.........."
####################################################################################################################
#Unpack the NRPE source code tarball
echo "Unpack the NRPE source code tarball..........."
pwd
cd /nagios
tar xzf /nagios/nrpe-2.15.tar.gz
echo "Unpack completed...."
cd /nagios/nrpe-2.15
####################################################################################################################
#Compile and install the NRPE addon
#-------------------------------------------------------------------------------------------------------------------
pwd
echo "Compile and install the NRPE addon"
./configure
echo "Configuring completed....."
make all
echo "Make all Configuration completed."
####################################################################################################################
#Installing NRPE plugin daemon
#-------------------------------------------------------------------------------------------------------------------
echo "Installing  NRPE plugin daemon........... "
make install-plugin
echo "Done..."
make install-daemon
echo "Done make install-daemon....."
make install-daemon-config
echo "Done install-daemon-config....."
####################################################################################################################
#NRPE daemon under xinetd as a service
#-------------------------------------------------------------------------------------------------------------------
echo "Installing NRPE daemon under xinetd as a service............"
make install-xinetd
###################################################################################################################
#In this Section we will add the IP Address of Nagios Server.
#------------------------------------------------------------------------------------------------------------------
echo "Adding the Nagios Server IP in the following file /etc/xinetd.d/nrpe "
cd /etc/xinetd.d/
sed -i "s@$only_from = 127.0.0.1@$only_from = 127.0.0.1 localhost 172.31.1.13@" /etc/xinetd.d/nrpe
###################################################################################################################
#Adding the NPRE Service details in the Service file
#------------------------------------------------------------------------------------------------------------------
echo "NPRE Service details in the Service file /etc/services............"
cd /etc/
sed -i '$ a nrpe            5666/tcp                 NRPE' services
###################################################################################################################
#In this section we will restart the services 
#------------------------------------------------------------------------------------------------------------------
echo "Restarting the Services....."
service xinetd restart
##################################################################################################################
#Entering the port to be opend in the firewall
------------------------------------------------------------------------------------------------------------------
iptables -A INPUT -p tcp -m tcp --dport 5666 -j ACCEPT
echo "Saving the IP Tables"
iptables-save > /etc/sysconfig/iptables
echo "Done with the configurations of nrpe and installation..."
###################################################################################################################
#------------------------------------------------------------------------------------------------------------------
echo "Printing the NPRE Version...."
cd /
/usr/local/nagios/libexec/check_nrpe -H localhost
###################################################################################################################
#In this Section we will get the private ip address of the client machine and put it into the a file.
#------------------------------------------------------------------------------------------------------------------
echo "Getting the IP Address of the Client Machine...."
cd /
echo "Creating a Dir under following path /.."
mkdir clientmachine
hostdetails=$(hostname)
echo "Directory created..."
hostname -i > /clientmachine/$hostdetails.txt
hostname >> /clientmachine/$hostdetails.txt
echo "IP Address Saved under the following path /clientmachine/"
####################################################################################################################
#In this Section we will login and put the ip address of client machine in the nagios sever.
#-------------------------------------------------------------------------------------------------------------------
user="nagiosadmin"
pass="admin123"
host="54.169.184.156"
directory="/home/nagiosadmin/"
srcfile="/clientmachine/ip.txt"
lftp -u $user,$pass sftp://$host << --EOF--

cd $directory

put $srcfile

quit

--EOF--

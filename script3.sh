#########################################################################################################################################
#In this Script We Will Append All the ClientIP Address Files into One file
#!/bin/bash
cd /apps/omkar/
echo "Creating a Directory Called ClientIPAddressNagios....."
mkdir ClientIPAddressNagios   
touch ipinfo
echo "Changing Directory and going into where Client IP"
echo "Changing the Direc"
cd /apps/omkar/Files/NagiosClientInfo
pwd
echo "Appending the Files."
for f in *.txt 
do 
ip=$f
#echo "IPAddress $ip"	
cat $ip >> /apps/omkar/ClientIPAddressNagios/ipinfo
done 
###############################################################################################################################################
#In this Script We will put the IP Address Into Nagios Config File
cd /apps/omkar/ClientIPAddressNagios/
echo "Stating the Loop over the file............"
echo "Hostname of the machine is................"
hostnm=$(sed -n '2'p /apps/omkar/ClientIPAddressNagios/ipinfo)
echo "$hostnm"
for p in $(cat ipinfo)
do
    echo $p
	if grep -q "$p" /apps/omkar/NagiosConfig/hosts.cfg 
	 then
  		echo "IP Address Already Exist in the Configuration..."
	else
  		echo "## Default" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "define host{" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "use                             linux-box               	    ; Inherit default value$" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "host_name                       $hostnm                       ; The name we'r$" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "alias                           RHEL 7                        ; A longer name for the s$" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "address                         $p                            ; IP address of Remote$" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "contacts                        servers-service-now" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "_category                       VM" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "_subcat                         Host" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "_priority                       1" >> /apps/omkar/NagiosConfig/hosts.cfg
		echo "}" >> /apps/omkar/NagiosConfig/hosts.cfg
		
	fi
done
##################################################################################################################################################
#Adding the Hostname in the services config file.
sed -i '/\<host_name *\>/ s/$/,'$hostnm'/' "/apps/omkar/NagiosConfig/services.cfg"
echo "Adding HostName Done....................."
echo "Process Completed.... Checking done......"
##################################################################################################################################################
#Adding the Client Machine Details in the etc/hosts file 
echo "Adding the Client Machine Details........."
c=$p"  "$hostnm
echo "$c" >> /etc/hosts
echo "Done Putting the host entry in the hosts file......."
echo "Restarting the Nagios Server.............."
service nagios restart
######################################################################################################################################################
echo "End of the Script..............."
echo "Pending work is to delete the file............."
######################################################################################################################################################
#Taking the Backup of the ipinfo file which contains the Client IP Address and Hostname...
echo "Taking the Backup of the files with date"
cd /
mkdir BackupFilesDND
cd /BackupFilesDND 
cp /apps/omkar/ClientIPAddressNagios/ipinfo /BackupFilesDND/ipinfo.`date +"%d-%m-%Y`
######################################################################################################################################################
#Deleting the File Called ipinfo......
rm -rf /apps/omkar/ClientIPAddressNagios/ipinfo
echo "All Process Completed......................."


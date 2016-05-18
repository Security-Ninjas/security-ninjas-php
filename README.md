# Security Ninjas: An Open Source AppSec Training

This hands-on training lab consists of 10 fun real world like hacking exercises, corresponding to each of the OWASP Top 10 vulnerabilities. Hints and solutions are provided along the way. Although the backend for this is written in PHP, vulnerabilities would remain the same across all web based languages, so the training is still relevant even if you don't actively code in PHP. 

This iteration of the course has been updated from the [original verion](https://engineering.opendns.com/2015/03/16/security-ninjas-an-open-source-application-security-training-program/) published by OpenDNS. It can be run self-contained, or as the hand-on portion of a more complete training program. 


### To run the lab image

1. Install [docker](https://docs.docker.com/installation/) and make sure it works.

2. Start the container by running the following command (select an appropriate host port, 8000 here):

    docker run -it --rm -p 8000:80 cniemira/security-ninjas

3. Determine the IP address of your container
    Likely, 'localhost' will do. If you're using 'docker-machine' you will need to determine the VM IP.

4. The training should be running now.
	


### To use the lab

1. Select a browser to use during the lab. [Chrome](https://google.com/chrome) or [Firefox](https://mozilla.org/firefox) are recommended.

2. Install a cookie viewer/editor plugin such as [Cookies](https://chrome.google.com/webstore/detail/cookies/iphcomljdfghbkdcfndaijbokpgddeno?hl=en-US) for Chrome or [Cookie Manager+](https://addons.mozilla.org/en-US/firefox/addon/cookies-manager-plus/) for Firefox.

3. Install [ZAP](https://www.owasp.org/index.php/ZAP) and start it

4. Install the [FoxyProxy](https://getfoxyproxy.org/) plugin for your browser. Then: 
    - Configure a new proxy to use 127.0.0.1:8080 for the pattern "http://localhost:8000/\*" (use the correct location of your docker container).
    - Tell FoxyProxy to "Use proxies based on their pre-defined patterns and priorities."

5. Browse to [http://localhost:8000](http://localhost:8000) (or wherever the docker container is running).

6. Click on the ninja to see the first exercise.

7. Kill the docker container after you are done with `^c`.

---
CSS credits: html5up.net

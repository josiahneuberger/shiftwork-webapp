shiftwork-webapp
================

Shift Work Web App by Designaquark Josiah Neuberger
<a href="http://designaquark.com" target=_blank>http://designaquark.com<a/>

The Shift Work Web App is an open source web application that displays a rotating shifts in a nice format using html, javascript,
 and just a bit of php for masking of the pattern.
 
Update:
The html5 branch is a much better option. It plays better with smaller screens and the menu if fixed.
 
License Info:
-----------------
This web app makes use of many third party tools, which are licensed under various open source licenses. Also, the html5up branch is built on top of the 
html5up template 'Read Only', which is licensed under a Creative Commons 3.0: Attribution License. I have licensed my work under the Apache License 2.0; however,
all third-party tools/frameworks retain its original licence and may require attribution. Please consult a lawyer if you are unsure of what this means before
making use of this product.

WARNING: If you host this page on the internet then your schedule settings are exposed to the client. The only way to secure the settings.xml file is to
 hosts the web page on a local secured Intranet.


Brief setup instructions:

1. create folder 'cal_scripts' one level up from your 'public_html' directory
2. copy setup->settings.xml file to this directory you just created.
3. Run setup->encrypt.html
4. copy the encrypted password, pattern, and pattern_dates strings to your cal_scripts/settings.xml
4a. Note: pattern_dates must be a string of 4 dates with no spaces ie: 4/3/14,2/7/14,2/8/14,9/12/14
5. Open assets->logo.svg with Inkscape
6. Edit Logo name and export to dir: logos/your_logo.png (use page export at 1200px by 300px)
7. You should be setup!



shiftwork-webapp
================

Shift Work Web App by Designaquark Josiah Neuberger
<a href="http://designaquark.com" target=_blank>http://designaquark.com<a/>

The Shift Work Web App is an open source (Apache Licence 2.0) web application that displays a rotating shift in a nice format using html, javascript,
 and just a bit of php for masking of the pattern.

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



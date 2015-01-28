README - GT Thrift Shop (Main Webapp)
======

Authors: Kathy Cheng, Elizabeth Barsalou, Aditya Pujari, Steve Koshy, Matthew Paragot.

Our application is completely web-based. All you have to do is open up:
http://gt-thrift-shop.herokuapp.com/

Posts are currently being read in from Facebook's GT Thrift Shop application and 
displayed on the website. Click "View Post" to connect to the Facebook post and 
continue transactions from there.

Backend is totally set up. Posts from Facebook are being categorized via hashtags.
This can be seen by checking out our second repository which contains our database
code at https://github.com/skoshy/GTthriftshop-db

To Deploy (Main Webapp)
==========

To deploy our application, simply do the following:

- Clone our Github repository from https://github.com/mjparangot/GTthriftshop
- Set up a Heroku app with the Heroku Toolbelt, which can be downloaded and installed through here:
  https://toolbelt.heroku.com/
- Associate the Heroku app with the cloned Git repo by using this command in the repo folder:
  `heroku git:remote -a {project}`, where {project} is the name of yur Heroku app
- Push to Heroku using `git push heroku master`
- The app should now be set up at your Heroku URL! (note: our source contains our database's information)

To Deploy (Full)
=========
- Follow the above to setup the Main Webapp
- Follow the instructions in our Database Code repo to set up the database pulling code: https://github.com/skoshy/GTthriftshop-db
- You're done!

More Documentation
====

More documentation can be found at this link:
https://docs.google.com/document/d/1RGtX1ilnokVitz5nCWhWCRCQB0ld4XMXgSpRRx5jKYI/edit

#!/usr/bin/env python

import dropbox 

from dropbox.client import DropboxOAuth2FlowNoRedirect, DropboxClient
from dropbox import rest as dbrest

## Get your app key and secret from the Dropbox developer website
app_key = '6t0sputqg376xj8' 
app_secret = 'a10tg8xu9guwbox'

flow = dropbox.client.DropboxOAuth2FlowNoRedirect(app_key, app_secret)

# Have the user sign in and authorize this token
authorize_url = flow.start()
print '1. Go to: ' + authorize_url
print '2. Click "Allow" (you might have to log in first)'
print '3. Copy the authorization code.'
code = raw_input("Enter the authorization code here: ").strip()

# This will fail if the user enters an invalid authorization code
access_token, user_id = flow.finish(code)

client = dropbox.client.DropboxClient(access_token)
# dump user account info.
#print 'linked account: '
#for X in client.account_info():
#    print X

# dump folder metadata
folder_metadata = client.metadata('/')
for Y in folder_metadata:
    print Y

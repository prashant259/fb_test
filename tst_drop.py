#!/usr/bin/env python

import dropbox 
import pprint

from dropbox.client import DropboxOAuth2FlowNoRedirect, DropboxClient
from dropbox import rest as dbrest

## Get your app key and secret from the Dropbox developer website
app_key = '6t0sputqg376xj8' 
app_secret = 'a10tg8xu9guwbox'

flow = dropbox.client.DropboxOAuth2FlowNoRedirect(app_key, app_secret)

try: 
    client = dropbox.client.DropboxClient(access_token)  
    folder_metadata = client.metadata('/')
except Exception, e:

    print "No previous authentication, Aunthenticate now !!" 
    # Have the user sign in and authorize this token
    authorize_url = flow.start()
    print '1. Go to: ' + authorize_url
    print '2. Click "Allow" (you might have to log in first)'
    print '3. Copy the authorization code.'
    code = raw_input("Enter the authorization code here: ").strip()
    ## This will fail if the user enters an invalid authorization code
    access_token, user_id = flow.finish(code)
    ## After obtaining access_token, accessing client data
    client = dropbox.client.DropboxClient(access_token)

### dump folder metadata
folder_metadata = client.metadata('/')
## Setting pretty print option
pp = pprint.PrettyPrinter(indent=4)
print "\n metadata: " + pp.pprint(folder_metadata)

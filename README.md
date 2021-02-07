# qs-demo-proxy

Two simple PHP proxies built for ivanvpan/qsform (https://github.com/ivanvpan/qsform): One for ActiveCampaign progressive contact syncing, and one for simulating the new QS Submission API via a third party service at Formbackend.com


## Notes

Active Campaign has limited fields for the contact, and will not take all fields out of the box that we are passing. Specifically, only the following fields are in an AC Contact

**contactEmail** 

This is the unique identifier of the contact in AC, all other fields bind to this. If a new email 


**first_name**

**last_name**

**phone**

**fieldValues**

These contain value pairs for additional contact fields that the admin of AC must add and enable.



```
{
	"contact": {
		"email": "jondoe@example.com",
		"firstName": "John",
		"lastName": "Doe",
		"phone": "7223224241",
    "fieldValues":[
      {
        "field":"1",
        "value":"The Value for First Field"
      },
      {
        "field":"6",
        "value":"2008-01-20"
      }
    ]
	}
}
```

## Documentation

This contains 2 test html forms that capture all unrequired, unvalidated fields, and passes them to a proxy for each 3rd party endpoint. 

In the future, you could continue to use and modify these proxies, instead of having to modify the front end code to pass the payload to Active Campaign and the new Submission API endpoint.

There is also value in using these proxies and application files within the same subdomain, to avoid security issues.

## Active Campaign API

This is currently using the Doublenines API Key. This Endpoint will be active until 2/31/2021, but data and key are tied to the 99s Team Account. The API Key is found . This should be irrelevant as soon as 2/10/2021.

### Getting Started
https://help.activecampaign.com/hc/en-us/articles/207317590-Getting-started-with-the-API

### Create or Update Contact
https://developers.activecampaign.com/reference#create-or-update-contact-new

## Deploying

This is currently wired to a Heroku build pipeline for the purpose of the demo. Committing to the main branch triggers the deploy. There is no staging version for the purposes of the demo. 

Current URL is: https://qs-demo-proxy.herokuapp.com/

# Repository Structure

```
/
/web					--- contains the files served on the web, as defined in the Procfile
/web/form-test-activecampaign.html	--- test form for active campaign
/web/form-test-formbackend.html		--- test form for temp submission api
/web/api/simple-proxy-activecampaign.php -- proxy submission api, currently <> 99s API Token for activecampaign.com
/web/api/simple-proxy-formbackend.php	--- proxy active campaign api, currently <> 99s Account for formbackend.com

/web/tools/getCustomFields.php	--- non-integrated tool for looking up the id's of the contact fields at activecampaign
/web/vendor/			--- composer for supporting heroku
/*				--- application package and heroku environmental files
```



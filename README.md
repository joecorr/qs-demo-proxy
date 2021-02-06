# qs-demo-proxy

This demo's purpose is to serve as a proxy for the active campaign contact submission and updates.

This proxy is based on the official Active Campaign API PHP Starter Kit found in their repo https://github.com/ActiveCampaign/activecampaign-api-php

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

Refer to the documentation from active campaign found here 

### Getting Started
https://help.activecampaign.com/hc/en-us/articles/207317590-Getting-started-with-the-API

### Create or Update Contact
https://developers.activecampaign.com/reference#create-or-update-contact-new

## Deploying

This is currently wired to a Heroku build pipeline for the purpose of the demo. Committing to the main branch triggers the deploy. There is no staging version for the purposes of the demo



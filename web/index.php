<html>
<head>
  <title>qs - activecampaign - form demo for proxy test</title>
</head>


<body>

<h1>activecampaign demo</h1>

<!--

From the working form, we need to simulate these values

  | 'businessName'
  | 'contactFirstName'          *** default activecampaign field
  | 'contactLastName'           *** default activecampaign field
  | 'contactEmail'              *** default activecampaign field
  | 'contactPhoneNumber'        *** default activecampaign field
  | 'amountToFinance'
  | 'itemsToFinance'
  | 'userTitle'
  | 'userPercentOwnership'
  | 'userSocialSecurity'
  | 'userPersonalAddress'
  | 'legalBusinessName'
  | 'businessAddress'
  | 'businessPhoneNumber'
  | 'businessForm'
  | 'businessIsStartup'
  | 'businessYearsInBusiness'
  | 'businessWebsiteOrSocialUrl'
  | 'yourStory'

-->
<form action="demo-proxy.php" method="post">
 <ul>
  <li>
    <label for="contactEmail">contactEmail:</label>
    <input type="email" id="contactEmail" name="contactEmail">
  </li>
  <li>
    <label for="contactFirstName">contactFirstName:</label>
    <input type="text" id="contactFirstName" name="contactFirstName">
  </li>
  <li>
    <label for="contactLastName">contactLastName:</label>
    <input type="text" id="contactLastName" name="contactLastName">
  </li>
  <li>
    <label for="contactPhoneNumber">contactPhoneNumber:</label>
    <input type="tel" id="contactPhoneNumber" name="contactPhoneNumber">
  </li>
  <hr>
  <i>begin values not required by activecampaign default contacts</i>
  <hr>
  <li>
    <label for="businessName">businessName:</label>
    <input type="text" id="businessName" name="businessName">
  </li>
  <li>
    <label for="amountToFinance">amountToFinance:</label>
    <input type="text" id="amountToFinance" name="amountToFinance">
  </li>
  <li>
    <label for="itemsToFinance">itemsToFinance:</label>
    <input type="text" id="itemsToFinance" name="itemsToFinance">
  </li>
  <li>
    <label for="userTitle">userTitle:</label>
    <input type="text" id="userTitle" name="userTitle">
  </li>
  <li>
    <label for="userPercentOwnership">userPercentOwnership:</label>
    <input type="text" id="userPercentOwnership" name="userPercentOwnership">
  </li>
  <li>
    <label for="userPersonalAddress">userPersonalAddress:</label>
    <input type="text" id="userPersonalAddress" name="userPersonalAddress">
  </li>
  <li>
    <label for="legalBusinessName">legalBusinessName:</label>
    <input type="text" id="legalBusinessName" name="legalBusinessName">
  </li>
  <li>
    <label for="businessAddress">businessAddress:</label>
    <input type="text" id="businessAddress" name="businessAddress">
  </li>
  <li>
    <label for="businessPhoneNumber">businessPhoneNumber:</label>
    <input type="text" id="businessPhoneNumber" name="businessPhoneNumber">
  </li>
  <li>
    <label for="businessForm">businessForm:</label>
    <input type="text" id="businessForm" name="businessForm">
  </li>
  <li>
    <label for="businessIsStartup">businessIsStartup:</label>
    <input type="text" id="businessIsStartup" name="businessIsStartup">
  </li>
  <li>
    <label for="businessYearsInBusiness">businessYearsInBusiness:</label>
    <input type="text" id="businessYearsInBusiness" name="businessYearsInBusiness">
  </li>
  <li>
    <label for="businessWebsiteOrSocialUrl">businessWebsiteOrSocialUrl:</label>
    <input type="text" id="businessWebsiteOrSocialUrl" name="businessWebsiteOrSocialUrl">
  </li>
  <li>
    <label for="yourStory">yourStory:</label>
    <input type="text" id="yourStory" name="yourStory">
  </li>

 </ul>
 <input type="submit" />
</form>


</body>


</hmtl>
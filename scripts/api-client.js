//remove!!!
const apiKey = 'b8ef1cc61e8da56ab77295c2cdeb68eb';

//Get authenticated to make api calls
async function getAccessToken(apiKey) {
    const response = await fetch('https://api.invoice.ng/v1/authenticate', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({'api_key' : apiKey })
    });
  
    const { token } = await response.json();
    return token;
}

//Use to create a user in the invoices database using the userData and authtoken
async function createUser(authToken, userData) {
    const response = await fetch('https://api.invoice.ng/v1/client/add', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${authToken}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(userData)
    });
  
    return await response.json();
}

//Converts a name and email to userData for creating a user
function convertUserData(name, email, id){
    const userData = {
        "id": id,
        "names": name,
        "email": email,
    };
    return userData
}

//creates an invoice into the api Maar de 500 error is server side van de gekozen api
async function createInvoice(authToken) {
    try {
      const response = await fetch('https://api.invoice.ng/v1/invoice/add', {
        method: "POST",
        headers: {
          'Authorization': `Bearer ${authToken}`,
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          client: "606213207287745",
          invoice_no: "1",
          payment_status: "Not Paid",
          currency: "EUR",
          tax_rate: 21,
          items: [
            {
              description: "item1",
              quantity: 1,
              rate: "20"
            },
            {
              description: "item2",
              quantity: 2,
              rate: "40"
            }
          ]
        })
      });
      const data = await response.json();
      console.log(data);
    } catch (error) {
      console.error("There was a problem with the fetch operation:", error);
    }
  }

// main function to test
async function main(){
    const authToken = await getAccessToken(apiKey);    
    const userData = convertUserData('mitch', 'mitch@boontjes.nl', 606213207287745);

    await createUser(authToken, userData);
    await createInvoice(authToken);
}

main();
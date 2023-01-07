# POS API

Response schema: JSON Object {
"success": boolean,
"message_code": string,
"body": Array
}

GET /items

- Fetches all items from DB
- Request Arguments: None
- 404 will be returned if no item was found

GET /item

- Fetch item by selecte form from DB
- Request Arguments: item_id
- 404 will be returned item_was_not_created

POST /transactions/create

- create new transacion 
- Request Arguments: {"item_id": int , "quantity": int , "total": int , "user_id": int}
- 422 will be returned if name param was not found

PUT /transactions/update

- updates the quantity of item when the transaction is done
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found
- 404 will be retruned if no item was found

DELETE /transactions/delete

- deletes transaction
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found

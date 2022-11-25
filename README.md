## Project Setup

1. Clone git repository and cd into dir

2. Create .env file
   `cp .env.example .env`

3. Set db credentials in .env

4. Generate app key
   `php artisan key:generate`

5. Run migrate
   `php artisan migrate`

6. Start local server
   `php artisan server`


## Details

- There are two api endpoints

    - `/api/image` with post method to upload image
        - Sample output success
            ```json
            {
                "image": "1669391803.png",
                "updated_at": "2022-11-25T15:56:43.000000Z",
                "created_at": "2022-11-25T15:56:43.000000Z",
                "id": 3
            }
            ```
        - Sample output error
            ```json
            {
                "message": "The image field is required.",
                "errors": {
                    "image": [
                    "The image field is required."
                    ]
                }
            }
            ```
    - `/api/image` with get method to get all uploaded image data.
        - Sample output
            ```json
            [
                {
                "id": 1,
                "image": "http://127.0.0.1:8000/images/1669390256.png",
                "created_at": "2022-11-25T15:30:56.000000Z",
                "updated_at": "2022-11-25T15:30:56.000000Z"
                },
                {
                "id": 2,
                "image": "http://127.0.0.1:8000/images/1669390927.png",
                "created_at": "2022-11-25T15:42:07.000000Z",
                "updated_at": "2022-11-25T15:42:07.000000Z"
                }
            ]
            ```

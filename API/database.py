import json
import os
from supabase_py import create_client, Client


url: str = os.environ.get("SUPABASE_URL")
key: str = os.environ.get("SUPABASE_KEY")

supabase: Client = create_client(url, key)

def find_announce_list():
    data = supabase.table("announces").select("*").execute()
    #print(data['data'])
    print(data)
    #data['data'] = sorted(data['data'].items())
    return sorted(data['data'], key=lambda x: x['price'])

def add_announce_to_db(announce):
    output = supabase.table("announces").select("*").execute()
    for element in output['data']:
        if element['link'] == announce['link']:
            return

    data = supabase.table("announces").insert(announce).execute()
from lib2to3.pytree import Base
import requests
import json
from bs4 import BeautifulSoup
from discord_webhook import DiscordWebhook, DiscordEmbed
headers = {
    'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36'
}

def logic_immo():
    try:
        scraper = requests.Session()
        scraper.headers.update(headers)
        response = []

        get_homepage = scraper.get('https://www.logic-immo.com/', timeout=15)
        if get_homepage.status_code != 200:
            response['isSuccess'] = False
            response['status'] = 'Cannot Reach HomePage [Logic_Immo]'
            return response

        get_query = scraper.get('https://www.logic-immo.com/location-immobilier-carquefou-44470,5692_2/options/groupprptypesids=1,12/order=price_asc', timeout=15)
        #print(get_query.text)
        soup = BeautifulSoup(get_query.text, 'html.parser')
        global_div = soup.find('nav', {'id': 'announcesList'})
        results = global_div.find_all('article', {'class': 'announceBox standard-offer'})
        for result in results:
            item = {
                "price": result.find('span', {'class': 'announceDtlPrice'}).text.replace(u'\xa0', ' ').strip(),
                "area": result.find('span', {'class': 'announceDtlInfos announceDtlInfosArea'}).text,
                "rooms": result.find('span', {'class': 'announceDtlInfos announceDtlInfosNbRooms'}).text,
                "location": result.find('div', {'class': 'announcePropertyLocation'}).text.strip().replace(' ', ''),
                "image": result.find('img', {'class': 'announcePicture'})['src'],
                "link": result.find('a', {'class': 'announceDetailDecouvrir'})['href']
            }
            print(item)
            response.append(item)
        

        return response
    except BaseException as err:
        print(err)
        response['isSuccess'] = False
        response['status'] = err
        return response

def send_contact(email):
    try:
        webhook = DiscordWebhook(
            url="https://discord.com/api/webhooks/965962262949007430/mbn9J2ztNfyw4GXYClbNhcqclCzWZfaTP7aMO1_MfICRhFMGfDT87oyZOWP8Uu60CC2f",
            username="Form Manager")

        embed = DiscordEmbed(
            title="Nouvelle Demande Reçu ! :white_check_mark:", color=15158332
        )

        embed.set_footer(text="Club Immo - Nantes", icon_url=(
            "https://cdn.discordapp.com/attachments/752130443893145674/777191358665457674/logobyZoen.png"))
        embed.set_timestamp()
        embed.add_embed_field(name=":shopping_cart: Email", value=f"`{email}`", inline=False)

        webhook.add_embed(embed)
        response = webhook.execute()
        return True
    except BaseException:
        return False

    
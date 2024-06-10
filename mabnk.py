import requests
from bs4 import BeautifulSoup

# URL cần truy cập
url = "https://online.mbbank.com.vn/pl/login?returnUrl=%2F"

# Gửi yêu cầu HTTP để truy cập vào URL
response = requests.get(url)

# Kiểm tra xem yêu cầu có thành công không (status code 200 là thành công)
if response.status_code == 200:
    # Sử dụng BeautifulSoup để phân tích HTML
    soup = BeautifulSoup(response.content, 'html.parser')

    # Tìm thẻ <img> chứa dữ liệu image/png
    image_tag = soup.find('img', {'src': 'data:image/png;'})

    # Kiểm tra xem thẻ <img> có tồn tại không
    if image_tag:
        # Lấy nội dung của thuộc tính 'src' của thẻ <img>
        image_data = image_tag['src']

        # In ra dữ liệu image/png
        print("Data image/png:", image_data)
    else:
        print(response.text)
        print("Không tìm thấy dữ liệu image/png trên trang web.")
else:
    print("Yêu cầu truy cập không thành công. Mã trạng thái:", response.status_code)

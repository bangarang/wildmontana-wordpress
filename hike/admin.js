document.addEventListener("DOMContentLoaded", function () {
  const a = document.querySelector(".acf-field-message .acf-input");
  a.innerHTML =
    '<div id="refresh-button-container"> <button type="button" class="button-secondary" id="refresh-trail-data">Pull New Trail Data </button> <button type="button" class="button-secondary" id="clear-trail-data">Clear Trail Data </button></div>';
  // const data = {
  //   'refresh-trail-data': 1,
  // };

  // logJSONData();

  // fetch("/wp-admin/admin-post.php?action=contact_form", {
  //   method: "POST",
  //   headers: { "Content-Type": "application/json" },
  //   body: JSON.stringify(data),
  // });
  const refreshButton = document.getElementById("refresh-trail-data");
  refreshButton.addEventListener("click", function () {
    fetchTrailData();
  });
  const clearButton = document.getElementById("clear-trail-data");
  clearButton.addEventListener("click", function () {
    clearTrailData();
  });
});

async function logJSONData(page = 1) {
  const response = await fetch(
    `https://cdn.elebase.io/4d98752b-d833-4239-8a68-bf5ba176f5df/v1/entries?order=title&limit=400&type=ccc47729-d4fd-49e1-bba8-e24ca134dc8d&locale=en&phase=4&page=${page}`,
    {
      headers: {
        authorization:
          "Elebase cd06801a-acfb-44fb-afc1-d0879393578f:40360db976ac4207746a619c7a95f560cfcd4f4cbd5a354fd558eaaff47419b2:1686777834",
      },
    }
  );
  const data = await response.json();
  console.log({ data });
  const trails = [];
  data.data.index.forEach((trail) => {
    const trailData = {};
    trailData.title = trail.title;

    trailData.summary = trail.elements.find(
      (element) => element.name === "Summary"
    )?.data;

    const trailImages = trail.elements.find(
      (element) => element.name === "Images"
    )?.data;

    trailData.image_url = trailImages?.length > 0 ? trailImages[0].url : null;

    trails.push(trailData);
  });
  if (trails.length === 0) return null;

  // console.log({
  //   response: data,
  //   total: data.data.total,
  //   trails,
  //   stringtrails: JSON.stringify(trails),
  // });
  // var formData = new FormData();

  // // formData.append("action", "contact_form");
  // formData.append("name", "Alex");
  // formData.append("trails", JSON.stringify(trails));

  // const postResponse = await fetch(
  //   "/wp-admin/admin-post.php?action=contact_form",
  //   {
  //     method: "post",
  //     // headers: { 'Content-Type': 'application/json' },
  //     headers: { "Content-Type": "application/x-www-form-urlencoded" },
  //     body: formData,
  //     // body: JSON.stringify({trails})
  //   }
  // );
  // console.log({ postResponse });
  // const responseData = await postResponse.text();
  // console.log({ responseData });

  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
  myHeaders.append("Cookie", "wordpress_test_cookie=WP+Cookie+check");

  var urlencoded = new URLSearchParams();
  urlencoded.append("name", "Alex");
  urlencoded.append(
    "trails",
    // '["Allen Peak Trail #466","Antone Peak","Arrastra Creek Loop Trails #488 and #482","Badger Cabin","Bailey Lake, Trail #293","Baker Lake, Trail #234","Baldy-Edith Basin and Peaks Loop Trail #151","Baldy Mountain","Barry\'s Island at Bighorn Canyon NRA","Basin Lakes Trail #61 (NRT)","Bass Creek Overlook #392","Bass Creek Trail #4","Bear-Baree Loop (Trails #489 and #178)","Bear Canyon Creek Trail","Bear Canyon Ridge Trail (BLM #1014, USFS #2492 and #2814)","Bear Prairie Trail through Refrigerator Canyon #259","Bear Track Trail #8 (Sheep Creek Trail) to Silver Run Plateau","Bear Trap Canyon National Recreation Trail (NRT)","Bear Trap Canyon West Trail","Beaver Pond Nature Trail at Bighorn Canyon NRA","Beehive Basin Trail #40","Big Baldy Mountain #401, 414, 416 in the Little Belts","Big Creek Trail #180","Big Creek Trail, Trail #11","Bigfork Foothills XC Trail","Big Hole Lookout","Bighorn Head Gate at Bighorn Canyon NRA","Big Sky Ridge Trail","Big Snowies Ice Caves","Big Snowy Trail #650 to Lost Peak/Maynard Ridge","Big Spar Lake Trail ","Big Timber Creek Trail #119 to Granite Lake #118","Birch Lake","Bitter Creek Wilderness Study Area","Black Butte Trail to Dailey Creek","Black Diamond Trail","Blackfoot Meadows #329","Blackmore Trail #423 to Blackmore Peak Trail #415","Blacktail Mountain XC Trails - \\"Alpine\\" Loop","Blodgett Creek Trail #19","Blodgett Overlook Trail, Trail #101","Bobcat Lakes, Trail #226","Bohart Ranch XC Ski Center\'s Logger\'s Loop","Boulder Creek Trail, Trail #617","Boulder Lakes Trail #142","Bramlet Lake via Bramlet Creek #658","Brandon Butte, CMR Wildlife Refuge","Bridge Coulee Wilderness Study Area, Musselshell Breaks","Bridger Bowl South Loop","Bridger Bowl, Trail #532 to Hawk Watch"]'
    JSON.stringify({ trails })
  );

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  const newResponse = await fetch(
    "/wp-admin/admin-post.php?action=contact_form",
    requestOptions
  );
  // .then((response) => response.text())
  // .then((result) => console.log(result))
  // .catch((error) => console.log("error", error));
  const newResponseData = await newResponse.text();
  console.log({ newResponseData });
  return { trails, total: data.data.total };
}

async function fetchTrailData() {
  let page = 1;
  let currentTrailCount = 0;
  let totalTrails = 0;
  const a = document.querySelector(".acf-field-message .acf-input");
  while (true) {
    a.innerHTML = `<p>Pulling new trails... ${
      totalTrails && `${currentTrailCount} / ${totalTrails}`
    } . </p><div id="refresh-button-container"> <button type="button" class="button-secondary" id="refresh-trail-data" disabled>Pulling New Trail Data </button> <button type="button" class="button-secondary" id="clear-trail-data">Clear Trail Data </button></div>`;
    console.log({ page });
    const response = await logJSONData(page);
    console.log({ responseLength: response?.length });
    if (response === null) break;
    page++;
    currentTrailCount += response?.trails.length;
    totalTrails = response?.total;
  }
  a.innerHTML = `<p>Finished pulling ${currentTrailCount} new trails!</p><div id="refresh-button-container"> <button type="button" class="button-secondary" id="refresh-trail-data">Pull New Trail Data </button> <button type="button" class="button-secondary" id="clear-trail-data">Clear Trail Data </button></div>`;
}

async function clearTrailData() {
  const postResponse = await fetch(
    "/wp-admin/admin-post.php?action=clear_trail_data",
    {
      method: "post",
    }
  );
}

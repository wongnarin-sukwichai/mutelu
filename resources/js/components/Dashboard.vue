<template>
    <!-- Map Detail -->
    <GoogleMap
        api-key="AIzaSyCTTZZ1n55bBuMNrWNSBltniL1nsQChTHs"
        style="width: 100%; height: 100%"
        :center="center"
        :zoom="5"
    >
        <template v-for="(gmap, index) in mapList" :key="index">
            <Marker
                :options="{
                    position: {
                        lat: parseFloat(gmap.lat),
                        lng: parseFloat(gmap.lon),
                    },
                    icon: path + gmap.icon,
                }"
            >
                <InfoWindow>
                    <div id="content">
                        <h1 id="firstHeading" class="firstHeading font-bold">
                            {{ gmap.title }}
                        </h1>
                        <img
                            class="mt-2"
                            :src="pathMap + gmap.pic"
                            width="50"
                            height="50"
                        />
                        <div id="bodyContent">
                            <p class="font-normal indent-4 mt-2">
                                {{ removeTag(gmap.detail) }}...
                            </p>
                            <p class="mt-1">
                                อ่านเพิ่มเติม :
                                <box-icon
                                    name="link-external"
                                    size="xs"
                                    color="#3b82f6"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                    @click="mapDetail(gmap.id)"
                                ></box-icon>
                            </p>
                            <p class="mt-1">
                                ไปยังแผนที่ :
                                <box-icon
                                    name="map"
                                    type="solid"
                                    size="xs"
                                    color="#ef4444"
                                    animation="tada-hover"
                                    class="cursor-pointer"
                                    @click="linkMap(gmap.gmap)"
                                ></box-icon>
                            </p>
                        </div>
                    </div>
                </InfoWindow>
            </Marker>
        </template>
    </GoogleMap>
</template>

<script>
import { GoogleMap, Marker, InfoWindow, CustomMarker } from "vue3-google-map";

export default {
    mounted() {
        this.getMap();
    },
    data() {
        return {
            mapList: "",
            path: "/img/icon/",
            pathMap: "/storage/maps/thumbnails/",
        };
    },
    methods: {
        getMap() {
            axios
                .get("/api/mapAll")
                .then((response) => {
                    this.mapList = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        mapDetail(id) {
            this.$router.push("/mapDetail/" + id);
        },
        linkMap(link) {
            window.open(link, "_blank");
        },
        removeTag(str) {
            return str.replace(/&nbsp;|(<([^>]+)>)/g, "").substring(0, 200);
        },
    },
    components: { GoogleMap, Marker, InfoWindow, CustomMarker },
    setup() {
        const center = { lat: 15.286098648061838, lng: 100.96467575092925 };

        return { center };
    },
};
</script>

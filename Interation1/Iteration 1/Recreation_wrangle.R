library(lubridate)
library(ggplot2)
library(dplyr)
library(rlang)
library(data.table)
library(ggrepel)
library(tidyverse)
require(mapboxapi)
library(leaflet)
library(maps)
Sys.setenv('MAPBOX_TOKEN' = 'sk.eyJ1IjoieWFzaDA3MDE5NCIsImEiOiJja210NWtkNWwwb2F2Mm9sbTFkZW92MjExIn0.svjibK30Crxr1FhRR2i3zQ')

data_accidents = read_csv('D:/Sem 4/Industry Experience/R script/crash_data_clean.csv')
pbn <- read.csv('D:/Sem 4/Industry Experience/R script/Principal_Bicycle_Network_(PBN).csv')
suburb <- read.csv("D:/Sem 4/Industry Experience/R script/suburb_name.csv")
trail_names <- as.list(unique(pbn$name))
typeof(trail_names)
sub_list <- as.list(unique(suburb$suburb))


for (item in trail_names){
  list_trail = list()
  c(list_trail,paste(c(item,'Victoria',sep=' ')))
}

trail_names <- as.list(trail_names)
trail_names
lsit_trail = list()
for (i in 1:length(trail_names)){
  if (is_empty(trail_names[[i]])){
    print (i)
  }
}
list_1 = list()
for (i in trail_names){
  if (grepl("^\\s*$", i) == FALSE){
    list_1 <- c(list_1,i)
  }}

for (i in 1:length(list_1)){
  list_trail[[i]] <- paste(c(list_1[[i]],'Victoria'),sep = ' ',collapse = ' ')
}
#MAPBOX_TOKEN <- mb_access_token("sk.eyJ1IjoieWFzaDA3MDE5NCIsImEiOiJja21zZmNld3UwaDk3MzFveW96YWkwbWM3In0.JZd25WMs47rE8dfPSIixZA", install = TRUE)
library(leaflet)
library(leaflet.extras)
library(magrittr)
coord_list <- list()


dist_list = list()
sub_l = unlist(sub_list)

for(md in sub_l){
  for (item in list_trail){
    
    my_route <- mb_directions(
      origin = md,
      destination = item,
      profile = "cycling",
      steps = TRUE,
      language = "en"
    )
    my_route_dist <- list()
    my_route_disttotal<- Reduce("+",my_route$distance)
    dist_list <- c(dist_list,my_route_disttotal)
  }
  
  sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
  sorted_dist
  final_list = list()
  for (i in 1:3){
    
    a <- (which(dist_list == sorted_dist[i]))
    final_list <- c(final_list,list_trail[a])
  }
  final_list <- unique(final_list)

  
}  
coord_list <- list()
for (i in 1:length(final_list)){
  coord_list[[i]] <- mb_geocode(final_list[[i]])
}
final_list
sorted_dist
for (i in final_list){
  print (i)
}

df_2 <- (data.frame(t(sapply(coord_list,c))))
df_2$origin = lapua
df_2$trail_name = final_list
df_2$distance_from_origin = sorted_dist[1:3]


coord_list <- list()

dist_list = list()

for (item in list_trail){
  my_route <- mb_directions(
    origin = 'Caulfield Victoria',
    destination = item,
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route_dist <- list()
  my_route_disttotal<- Reduce("+",my_route$distance)
  dist_list <- c(dist_list,my_route_disttotal)

}
sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
final_list = list()
for (i in 1:3){
  a <- (which(dist_list == sorted_dist[i]))
  final_list <- c(final_list,list_trail[a])
}
final_list <- unique(final_list)
coord_list <- list()
for (i in 1:length(final_list)){
  coord_list[[i]] <- mb_geocode(final_list[[i]])
}
final_list
sorted_dist
for (i in final_list){
  
}

my_route1 <- mb_directions(
  origin = 'Caulfield Victoria',
  destination = unlist(final_list[1]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route2 <- mb_directions(
  origin = 'Caulfield Victoria',
  destination = unlist(final_list[2]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route3 <- mb_directions(
  origin = 'Caulfield Victoria',
  destination = unlist(final_list[3]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)


df_3 <- (data.frame(t(sapply(coord_list,c))))
df_3$origin = "Caulfield Victoria"
df_3$trail_name = final_list
df_3$distance_from_origin = sorted_dist[1:3]

merged_23 = rbind(df_2, df_3)
coord_list <- list()

list_trail



dist_list = list()

for (item in list_trail){
  my_route <- mb_directions(
    origin = 'Burwood Victoria',
    destination = item,
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route_dist <- list()
  my_route_disttotal<- Reduce("+",my_route$distance)
  dist_list <- c(dist_list,my_route_disttotal)
  dist_list
  

}
sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
final_list = list()
for (i in 1:3){
  a <- (which(dist_list == sorted_dist[i]))
  final_list <- c(final_list,list_trail[a])
}
final_list <- unique(final_list)
coord_list <- list()
for (i in 1:length(final_list)){
  coord_list[[i]] <- mb_geocode(final_list[[i]])
}
for (i in final_list){
  
}

my_route1 <- mb_directions(
  origin = 'Burwood Victoria',
  destination = unlist(final_list[1]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route2 <- mb_directions(
  origin = 'Burwood Victoria',
  destination = unlist(final_list[2]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route3 <- mb_directions(
  origin = 'Burwood Victoria',
  destination = unlist(final_list[3]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)


df_4 <- (data.frame(t(sapply(coord_list,c))))
df_4$origin = "Burwood Victoria"
df_4$trail_name = final_list
df_4$distance_from_origin = sorted_dist[1:3]



coord_list <- list()
dist_list = list()

for (item in list_trail){
  my_route <- mb_directions(
    origin = 'Geelong Victoria',
    destination = item,
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route_dist <- list()
  my_route_disttotal<- Reduce("+",my_route$distance)
  dist_list <- c(dist_list,my_route_disttotal)


}
sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
final_list = list()
for (i in 1:3){
  a <- (which(dist_list == sorted_dist[i]))
  final_list <- c(final_list,list_trail[a])
}
final_list <- unique(final_list)
coord_list <- list()
for (i in 1:length(final_list)){
  coord_list[[i]] <- mb_geocode(final_list[[i]])
}
final_list
sorted_dist
for (i in final_list){
  
}

my_route1 <- mb_directions(
  origin = 'Geelong Victoria',
  destination = unlist(final_list[1]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route2 <- mb_directions(
  origin = 'Geelong Victoria',
  destination = unlist(final_list[2]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route3 <- mb_directions(
  origin = 'Geelong Victoria',
  destination = unlist(final_list[3]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)


df_5 <- (data.frame(t(sapply(coord_list,c))))
df_5$origin = "Geelong Victoria"
df_5$trail_name = final_list
df_5$distance_from_origin = sorted_dist[1:3]


#origin 5

coord_list <- list()


dist_list = list()

for (item in list_trail){
  my_route <- mb_directions(
    origin = 'Bayswater Victoria',
    destination = item,
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route_dist <- list()
  my_route_disttotal<- Reduce("+",my_route$distance)
  dist_list <- c(dist_list,my_route_disttotal)

}
sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
#sorted_dist
final_list = list()
for (i in 1:3){
  a <- (which(dist_list == sorted_dist[i]))
  final_list <- c(final_list,list_trail[a])
}
final_list <- unique(final_list)
coord_list <- list()
for (i in 1:length(final_list)){
  coord_list[[i]] <- mb_geocode(final_list[[i]])
}
for (i in final_list){
  
}

my_route1 <- mb_directions(
  origin = 'Bayswater Victoria',
  destination = unlist(final_list[1]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route2 <- mb_directions(
  origin = 'Bayswater Victoria',
  destination = unlist(final_list[2]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)
my_route3 <- mb_directions(
  origin = 'Bayswater Victoria',
  destination = unlist(final_list[3]),
  profile = "cycling",
  steps = TRUE,
  language = "en"
)

df_6 <- (data.frame(t(sapply(coord_list,c))))


df_6$origin = "Bayswater Victoria"
df_6$trail_name = final_list
df_6$distance_from_origin = sorted_dist[1:3]

merged_data = rbind(df_2, df_3, df_4, df_5, df_6)
merged_data = as.data.frame(merged_data)

write.csv(df, 'D:/Sem 4/Industry Experience/R script/recreation_data.csv')
df <- apply(merged_data,2,as.character)

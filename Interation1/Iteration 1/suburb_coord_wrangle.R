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

suburb_bh <- read.csv("D:/Sem 4/Industry Experience/R script/suburb_name.csv")
sub_list1 <- as.list(unique(suburb_bh$suburb))
list_final = list()
data_sub = as.data.frame("suburb", "Longitute", "Latitude")
list_new = list()
coord_list <- list()
for (i in 1:length(sub_list1)){
  coord_list[[i]] <- mb_geocode(sub_list1[[i]])
}

coord_list [1]
  
df_3 <- (data.frame(t(sapply(coord_list,c))))

suburb_bh["Long"] = df_3$X1
suburb_bh["Lat"] = df_3$X2
merged_data = rbind(df_2, df_3, df_4, df_5, df_6)
merged_data = as.data.frame(merged_data)
head(suburb_bh)
write.csv(suburb_bh, 'D:/Sem 4/Industry Experience/R script/suburb_coord_data.csv')

#Generating coordinates for the trails

pbn <- read.csv('D:/Sem 4/Industry Experience/R script/Principal_Bicycle_Network_(PBN).csv')
trail_names <- as.list(unique(pbn$name))
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
list_trail
coord_list1 = list()
for (i in 1:length(list_trail)){
  coord_list1[[i]] <- mb_geocode(list_trail[[i]])

}

coord_list1 [1]
df_4 <- (data.frame(t(sapply(coord_list1,c))))

df_4["Trail"] = list_trail
trail["Long"] = df_4$X1
trail["Lat"] = df_4$X2
merged_data = rbind(df_2, df_3, df_4, df_5, df_6)
merged_data = as.data.frame(merged_data)
write.csv(df_4, 'D:/Sem 4/Industry Experience/R script/trail_coordinates.csv')


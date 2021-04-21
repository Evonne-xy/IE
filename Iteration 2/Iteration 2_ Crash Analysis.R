#install.packages("ggmap")
#install.packages("maps")
#install.packages("mapdata")
#install.packages("gganimate")

library(leaflet)
library(tidyverse)
library (dplyr)
library(ggplot2)
library(ggmap)
library(ggthemes)
library(RColorBrewer)
library("dplyr")
library(gganimate)
library(rstatix)

#reading the accident data
acc_data <- read_csv('ACCIDENT.csv')
#keeping only the relevant columns
keep_acc <- c("ACCIDENT_NO", "ACCIDENTDATE", "ACCIDENTTIME", "ACCIDENT_TYPE","Accident Type Desc", "DAY_OF_WEEK", "Day Week Description",
              "ROAD_GEOMETRY", "Road Geometry Desc", "SPEED_ZONE", "SEVERITY")
trans_acc <- (acc_data[keep_acc])

#reading the vechicle data

veh_data <- read_csv('VEHICLE.csv')
#keeping only the relevant columns
keep_veh <- c("ACCIDENT_NO", "VEHICLE_TYPE", "Vehicle Type Desc")
trans_veh <- (veh_data[keep_veh])

#reading the location data "NODE"
loc_data <- read_csv('NODE.csv')

#keeping relevant columns
keep_loc <- c("ACCIDENT_NO", "LGA_NAME", "LGA_NAME_ALL", "Lat", "Long",
              "POSTCODE_NO")
trans_loc <- (loc_data[keep_loc])

#reading the accident_location data
accloc_data <- read_csv('ACCIDENT_LOCATION.csv')
#keeping only the relevant columns
keep_accloc <- c("ACCIDENT_NO", "ROAD_NAME", "ROAD_TYPE", "ROAD_TYPE_INT", "DISTANCE_LOCATION")
trans_accloc <- (accloc_data[keep_accloc])


#merging 4 datasets
merged_data_accveh = merge(trans_acc, trans_veh)

merged_data_accveh_loc = merge(merged_data_accveh, trans_loc)

merged_data_3 = merge(merged_data_accveh_loc, trans_accloc)

#filter and create the final dataset for cycles only

final_data = merged_data_3[merged_data_3$VEHICLE_TYPE == '13',]

#changing date format and stripping the year
final_data$ACCIDENTDATE <- format(as.Date(final_data$ACCIDENTDATE, format = "%d/%m/%Y"), "%Y-%m-%d")
final_data$ACCIDENTDATE <- as.Date(final_data$ACCIDENTDATE, "%Y-%m-%d" )
final_data$YEAR <- as.numeric(format(final_data$ACCIDENTDATE, "%Y"))

#keeping data from year 2015 to 2020
new_data = final_data[final_data$YEAR > 2016,]


new_data$sev_desc <- ifelse(new_data$SEVERITY == 1, 'Fatal accident',
                            ifelse(new_data$SEVERITY == 2, 'Serious injury accident',
                                   ifelse(new_data$SEVERITY == 3, 'Other injury accident', 'non injury accident')))

new_data
#keeping accidents which are only within 5 mts of an intersection
new_data = new_data[new_data$DISTANCE_LOCATION < 6,]

#write.csv(new_data, "suburb_shape_datafind.csv")

data_clean <- read.csv("Crash_data_suburb.csv")
sub_mel <- read.csv("suburbs_melbourne.csv")



#latitude long distance and count

plot_sub <- new_data %>% group_by(Long,Lat)
plot_sub
intersection_dist <- plot_sub %>%
  count(DISTANCE_LOCATION, sort = TRUE)
intersection_dist

#writing into JSON file
library("rjson")
list1 <- vector(mode = "list", length = 4)
list1[[1]] <- intersection_dist$Long
list1[[2]] <- intersection_dist$Lat
list1[[3]] <- intersection_dist$DISTANCE_LOCATION
list1[[4]] <- intersection_dist$n
list1

jsonData <- toJSON(list1)
write(jsonData, "intersection_json.json")

result<- fromJSON(file = "intersection_json.json")

print(result)
#write.csv(inter_data, "intersection_2018.csv")


sev_intersection <- plot_sub %>%
  count(sev_desc, sort = TRUE)
sev_intersection
#fatal accidents
sev_fatal <- sev_intersection[sev_intersection$sev_desc == "Fatal accident",]
sev_fatal

sev_fatal_loc <- sev_fatal %>% group_by(Long,Lat)
sev_fatal_loc

#severe injury accidents

serious_injury <- sev_intersection[sev_intersection$sev_desc == "Serious injury accident",]
serious_injury

serious_injury_loc <- serious_injury %>% group_by(Long,Lat)
serious_injury_loc
#accidents more than 1
serious_acc_2 = serious_injury_loc[serious_injury_loc$n > 1,]
serious_acc_2


#data from 2015-2020
new_data_2015 = final_data[final_data$YEAR > 2014,]

new_data_2015$sev_desc <- ifelse(new_data_2015$SEVERITY == 1, 'Fatal accident',
                            ifelse(new_data_2015$SEVERITY == 2, 'Serious injury accident',
                                   ifelse(new_data_2015$SEVERITY == 3, 'Other injury accident', 'non injury accident')))

new_data_2015
#keeping accidents which are only within 5 mts of an intersection
new_data_2015 = new_data_2015[new_data_2015$DISTANCE_LOCATION < 6,]
plot_sub_2015 <- new_data_2015 %>% group_by(Long,Lat)
plot_sub_2015
sev_intersection_2015 <- plot_sub_2015 %>%
  count(sev_desc, sort = TRUE)
sev_intersection_2015
#fatal accidents
sev_fatal_2015 <- sev_intersection_2015[sev_intersection_2015$sev_desc == "Fatal accident",]
sev_fatal_2015

sev_fatal_loc_2015 <- sev_fatal_2015 %>% group_by(Long,Lat)
sev_fatal_loc_2015

#severe injury accidents

serious_injury_2015 <- sev_intersection_2015[sev_intersection_2015$sev_desc == "Serious injury accident",]
serious_injury_2015

serious_injury_loc_2015 <- serious_injury_2015 %>% group_by(Long,Lat)
serious_injury_loc_2015
#accidents more than 1
serious_acc_2_2015 = serious_injury_loc_2015[serious_injury_loc_2015$n > 1,]
serious_acc_2_2015

severity_2015 <- sev_intersection_2015[sev_intersection_2015$sev_desc != "Other injury accident",]
severity_2015
severity_2015 = severity_2015[severity_2015$n > 1,]
sev_loc_2015 <- severity_2015 %>% group_by(Long,Lat)
sev_loc_2015



write.csv(sev_loc_2015, "serious_accidents_2015_2020.csv")
write.csv(sev_fatal_2015, "fatal accidents 2015-2020.csv")
write.csv(serious_acc_2, "serious accidents 2017-2020.csv")
write.csv(sev_fatal_loc, "Fatal accidents 2017-2020.csv")

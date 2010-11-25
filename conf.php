<?php
# $Id: conf.php.in 2294 2010-03-30 14:40:14Z hawson $
#
# Gmetad-webfrontend version. Used to check for updates.
#
include_once "./version.php";

$GLOBALS['ganglia_dir'] = dirname(__FILE__);
$GLOBALS['views_dir'] = $GLOBALS['ganglia_dir'] . '/conf';
$GLOBALS['conf_dir'] = $GLOBALS['ganglia_dir'] . '/conf';


#
# The name of the directory in "./templates" which contains the
# templates that you want to use. Templates are like a skin for the
# site that can alter its look and feel.
#
$template_name = "default";

#
# If you installed gmetad in a directory other than the default
# make sure you change it here.
#

# Where gmetad stores the rrd archives.
$gmetad_root = "/var/lib/ganglia";
$rrds = "$gmetad_root/rrds";

# Where to find filter configuration files, if not set filtering
# will be disabled
#$filter_dir = "$gmetad_root/filters";

# Leave this alone if rrdtool is installed in $gmetad_root,
# otherwise, change it if it is installed elsewhere (like /usr/bin)
define("RRDTOOL", "/usr/bin/rrdtool");

# If rrdcached is being used, this argument must specify the 
# socket to use.
#
# ganglia-web only requires, and should use, the low-privilege socket
# created with the -L option to rrdcached.  gmetad requires, and must use,
# the fully privileged socket created with the -l option to rrdcached.
$rrdcached_socket = "";

# Location for modular-graph files.
$graphdir='./graph.d';

# Display statistical values on RRD graphs; i.e.: average, min, max
$graphreport_stats = false;

#
# If you want to grab data from a different ganglia source specify it here.
# Although, it would be strange to alter the IP since the Round-Robin
# databases need to be local to be read. 
#
$ganglia_ip = "127.0.0.1";
$ganglia_port = 8652;

#
# The maximum number of dynamic graphs to display.  If you set this
# to 0 (the default) all graphs will be shown.  This option is
# helpful if you are viewing the web pages from a browser with a 
# small pipe.
#
$max_graphs = 0;

#
# In the Cluster View this sets the default number of columns used to
# display the host grid below the summary graphs.
#
$hostcols = 4;

#
# In the Host View this sets the default number of columns used to
# display the metric grid below the summary graphs.
#
$metriccols = 2;

#
# Turn on and off the Grid Snapshot. Now that we have a
# hierarchical snapshot (per-cluster instead of per-node) on
# the meta page this makes more sense. Most people will want this
# on.
#
$show_meta_snapshot = "yes";

# 
# The default refresh frequency on pages.
#
$default_refresh = 300;

#
# Colors for the CPU report graph
#
$cpu_user_color = "3333bb";
$cpu_nice_color = "ffea00";
$cpu_system_color = "dd0000";
$cpu_wio_color = "ff8a60";
$cpu_idle_color = "e2e2f2";

#
# Colors for the MEMORY report graph
#
$mem_used_color = "5555cc";
$mem_shared_color = "0000aa";
$mem_cached_color = "33cc33";
$mem_buffered_color = "99ff33";
$mem_free_color = "00ff00";
$mem_swapped_color = "9900CC";

#
# Colors for the LOAD report graph
#
$load_one_color = "CCCCCC";
$proc_run_color = "0000FF";
$cpu_num_color  = "FF0000";
$num_nodes_color = "00FF00";

# Other colors
$jobstart_color = "ff3300";

#
# Colors for the load ranks.
#
$load_colors = array(
   "100+" => "ff634f",
   "75-100" =>"ffa15e",
   "50-75" => "ffde5e",
   "25-50" => "caff98",
   "0-25" => "e2ecff",
   "down" => "515151"
);

#
# Load scaling
#
$load_scale = 1.0;

#
# Default color for single metric graphs
#
$default_metric_color = "555555";

#
# Default metric 
#
$default_metric = "cpu_report";

#
# remove the domainname from the FQDN hostnames in graphs
# (to help with long hostnames in small charts)
#
$strip_domainname = "yes";

#
# Optional summary graphs
#
$optional_graphs = array();

# 
# Time ranges
# Each value is the # of seconds in that range.
#
$time_ranges = array(
   'hour'=>3600,
   '2hr'=>7200,
   '4hr'=>14400,
   'day'=>86400,
   'week'=>604800,
   'month'=>2419200,
   'year'=>31449600
);

# this key must exist in $time_ranges
$default_time_range = 'hour';


// Use graphite
$use_graphite = "no";
// 
$graphite_url_base = "http://127.0.0.1/render";
// 
$graphite_rrd_dir = "/opt/graphite/storage/rrd";


// One of the bottlenecks is that to get individual metrics we query gmond which
// returns every single host and all the metrics. If you have lots of hosts and lots of 
// checks this may be quite heavy so you may want to cache data
define("CACHEDATA", 1);
define("CACHEFILE",     $GLOBALS['ganglia_dir'] . "/conf/ganglia_metrics.cache");
define("CACHETIME",     120); // How long to cache the data in seconds


#
# Graph sizes
#
$graph_sizes = array(
   'small'=>array(
     'height'=>65,
     'width'=>200,
     'fudge_0'=>0,
     'fudge_1'=>0,
     'fudge_2'=>0
   ),
   'medium'=>array(
     'height'=>95,
     'width'=>300,
     'fudge_0'=>0,
     'fudge_1'=>14,
     'fudge_2'=>28
   ),

  'large'=>array(
     'height'=>150,
     'width'=>480,
     'fudge_0'=>0,
     'fudge_1'=>0,
     'fudge_2'=>0
   ),

   'xlarge'=>array(
     'height'=>300,
     'width'=>650,
     'fudge_0'=>0,
     'fudge_1'=>0,
     'fudge_2'=>0
   ),

   'mobile'=>array(
     'height'=>95,
     'width'=>220,
     'fudge_0'=>0,
     'fudge_1'=>0,
     'fudge_2'=>0
   ),

   # this was the default value when no other size was provided.
   'default'=>array(
     'height'=>100,
     'width'=>400,
     'fudge_0'=>0,
     'fudge_1'=>0,
     'fudge_2'=>0
   )


);
$default_graph_size = 'default';
$graph_sizes_keys = array_keys( $graph_sizes );

# In earlier versions of gmetad, hostnames were handled in a case
# sensitive manner
# If your hostname directories have been renamed to lower case,
# set this option to 0 to disable backward compatibility.
# From version 3.2, backwards compatibility will be disabled by default.
# default: true  (for gmetad < 3.2)
# default: false (for gmetad >= 3.2)
$case_sensitive_hostnames = true;
?>
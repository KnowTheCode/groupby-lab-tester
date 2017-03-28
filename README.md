# Groupby Lab Tester

This plugin tests two different approaches for getting an array of posts that are grouped by each term.  This plugin is a companion to the Know the Code Hands-on Advanced Lab, [Get Posts Grouped by Terms](https://knowthecode.io/labs/get-posts-by-terms).  In this lab, you will learn how to use this plugin as well as a deep dive into more advanced SQL Queries and `$wpdb` (i.e. WordPress' MySQL Wrapper).

## Approaches

1. Grab the terms first using `get_terms()` and then loop through each term and query the database to grab the associated posts.
2. Build a more advanced SQL Query that performs the task in one database hit.

## First Approach

This first approach is found when doing a Google search.  It involves fetching all of the terms first.  Then iterating through those terms one-by-one.  During the loop, this approach uses `WP_Query` to get the posts that are associated with each term.

This approach works fine; however, it's less performant. Why?  It requires additional database hits.  Remember, the database is a bottleneck on the server side.  You want to optimize your trips to the database.

## Second Approach

The second approach uses `$wpdb` with a custom SQL query.  This query joins the multiple tables together and then groups them.  It allows us to fetch the records in one database hit....just ONE trip to the database.  That's much faster.

We use this approach on Know the Code, as part of our Help Center. 

## Lab Dependencies

For this lab, you will need to install the following plugins. You should have both of these installed on all of your projects.  These two plugins are for development only and not to be deployed to a live production site.

1. [UpDevTools](https://github.com/KnowTheCode/UpDevTools) - A suite of Developer tools including Kint, Whoops, and more.
2. [Query Monitor]() - We use Query Monitor to analyze the queries.

You will need a sandbox.dev site spun up on your local machine using DesktopServer, VVV, or your favorite web appliance.  Any theme will do.

## Installation

Make sure that you have a sandbox site setup.  We have a Sandbox repo ready for you.  It has everything you need, including dummy content. Use this sandbox to work along with Tonya.

1. In terminal, navigate to `{path to your sandbox project}/wp-content/plugins`.
2. Then type in terminal: `git clone https://github.com/KnowTheCode/groupby-lab-tester.git`
3. Log into your Sandbox site.
4. Go to Plugins and activate the plugin.